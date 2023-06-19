@extends('layout')
@section('title','La Liste Des Taches')
@section('activeindex',' active')
@section('content')
<div class="container">
        <a href="{{ route('tache.index', ['page' => $taches->currentPage(), 'status' => 'en cours']) }}" class="btn btn btn-secondary">Filtrer par statut <span class="text-dark">En cours</span></a>
 
        <a href="{{ route('tache.index', ['page' => $taches->currentPage(), 'status' => 'terminé']) }}" class="btn btn btn-secondary">Filtrer par statut <span class="text-dark">terminée </span></a>
 
        <a href="{{ route('tache.index', ['page' => $taches->currentPage(), 'sort' => 'date_echeance']) }}" class="btn btn btn-secondary">Filtrer par <span class="text-dark"> date d'échéance </span></a>

        <a href="{{ route('tache.index', ['page' => $taches->currentPage(), 'status' => $status, 'sort' => 'alphabetic']) }}" class="btn btn btn-secondary">Filtrer par <span class="text-dark"> ordre alphabétique </span></a>

    <form action="{{ route('tache.index') }}" method="GET">
        @csrf
                <div class="input-group" style="width: 50%;margin:30px 0">
                            <input type="text" placeholder="search" class="form-control" name="search">
                            <button type="submit" class="btn btn-secondary">Rechercher</button>
                </div>
        </form>
    </div>
    <table class="table table-hover table-bordered">
        <thead class="table-dark ">
            <tr class="text-center">
                <th>Titre</th>
                <th>Description</th>
                <th>Date Echéance</th>
                <th>Statut</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($taches as $item)
                <tr class="text-center" >
                    <td>{{$item->titre}}</td>
                    <td>{{$item->description}}</td>
                    <td>{{$item->date_echeance}}</td>
                    <td>{{$item->statut}}</td>
                    <td style="display: flex;justify-content:center">

                        <a href="{{route('tache.edit',$item->id)}}" class="btn btn-success me-2">Modifier <i class="far fa-edit"></i></a>


                        @if ($item->statut==='en cours')
                        <a href="{{route('tache.statut',$item->id)}}" class="btn btn-primary me-2 pe-4 ps-4 "> Done <i class="fas fa-check"></i> </a>
                        @endif

                        @if ($item->statut==='terminé')
                        <a href="{{route('tache.statut',$item->id)}}" class="btn btn-primary me-2 pe-3 ps-3 "> Restart  <i class="fas fa-sync "></i></a>
                        @endif

                        <form method="POST" action="{{ route('tache.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="confirm('Voulez-vous vraiment supprimer cette tache')">Supprimer <i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if ($taches->hasPages())
    <nav style="display:flex; justify-content:center;">
        <ul class="pagination">
            @if ($taches->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $taches->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif
                    @foreach ($taches->getUrlRange(1,$taches->lastPage()) as $page => $url)
                        @if ($page == $taches->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
            @if ($taches->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $taches->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>

@endif
@endsection