@extends('layout')
@section('title','Modifier La Tache')
@section('content')
<div class="container text-center">
    <h2 class="text-primary"> Modifier La Tache <span class="text-info"> {{$tache->titre}}</span></h2>
</div>
<form method="POST" action="{{route('tache.update',$tache->id)}}">
    @csrf 
    @method('PATCH')
    <div class="form-group">
      <label for="titre">Titre :</label>
      <input type="text" class="form-control mb-2" id="titre" name="titre" value="{{$tache->titre}}">
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-2" >{{$tache->description}}</textarea>
      </div>
      <div class="form-group">
        <label for="date_echeance">Date d'echéance :</label>
        <input type="date" class="form-control mb-2" id="date_echeance" name="date_echeance" value="{{$tache->date_echeance}}" >
      </div>
      <div class="form-group">
        <label for="statut">statut :</label>
        <select name="statut" id="statut" class="form-control mb-2">
            <option value="en cours" name="statut" {{$tache->statut == 'en cours' ? 'selected' : ''}}>en cours</option>
            <option value="terminé" name="statut" {{$tache->statut == 'terminé' ? 'selected' : ''}}>terminé</option>
    </select>
      </div>
    <button type="submit" class="btn btn-primary mt-2">Enregistrer</button>
  </form>
@endsection