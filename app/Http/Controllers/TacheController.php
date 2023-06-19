<?php

namespace App\Http\Controllers;

use App\Models\Tache;
use App\Models\TachHistory;
use Illuminate\Http\Request;

class TacheController extends Controller
{

  public function index(Request $request)
  {
    $perPage = 10;
    $status = $request->query('status');
    $sort = $request->query('sort');
    $search = $request->query('search');

    $tasksQuery = Tache::query();

    if ($status) {
      $tasksQuery->where('statut', $status);
    }

    if ($sort === 'date_echeance') {
      $tasksQuery->orderBy('date_echeance');
    }

    if ($sort === 'alphabetic') {
      $tasksQuery->orderBy('titre');
    }

    if ($search) {
      $request->validate([
        'search' => 'required|string',
      ]);
      $tasksQuery->where(function ($query) use ($search) {
        $query->where('titre', 'LIKE', '%' . $search . '%')
          ->orWhere('description', 'LIKE', '%' . $search . '%');
      });
    }

    $taches = $tasksQuery->paginate($perPage);
    $totalPages = $taches->lastPage();
    $requestedPage = $request->query('page', 1);

    if ($requestedPage > $totalPages) {
      return redirect()->route('taches.index', ['page' => $totalPages, 'status' => $status, 'sort' => $sort, 'search' => $search]);
    }

    return view('taches.index', compact('taches', 'status', 'sort', 'search'));
  }

  public function create()
  {
    

    return view('taches.create');
  }

  public function store(Request $request)
  {
    $newtache = new Tache();
    $newtache->titre = $request->titre;
    $newtache->description = $request->description;
    $newtache->date_echeance = $request->date_echeance;
    $newtache->statut = $request->statut;
    $newtache->save();
    return redirect('/tache');
  }

  public function show($id)
  {
  }

  public function edit($id)
  {
    $tache = Tache::find($id);
    return view('taches.edit', compact('tache'));
  }

  public function statut(Request $request, $id)
  {
    $tache_Update = Tache::find($id);

    if ($tache_Update->statut === 'terminé') {
      $tache_Update->update(['statut' => 'en cours']);
      return redirect('/tache');
    }

    if ($tache_Update->statut === 'en cours') {
      $tache_Update->update(['statut' => 'terminé']);

      return redirect('/tache');
    }
  }

  public function update(Request $request, $id)
  {
    $newtache = Tache::find($id);
    $pervious_titre = $newtache->titre;
    $newtache->titre = $request->titre;
    $newtache->description = $request->description;
    $newtache->date_echeance = $request->date_echeance;
    $newtache->statut = $request->statut;
    $newtache->save();
    dd($newtache);
    $history = new TachHistory();
    $history->tache_id = $newtache->id;
    $history->titre = $pervious_titre;
    $history->new_titre = $newtache->titre;
    $history->save();

    return redirect('/tache');
  }

  public function destroy($id)
  {
    $tache = Tache::find($id);
    $tache->delete();
    return redirect('/tache');
  }
}
