@extends('layout')
@section('title','Ajouter Une Tache')
@section('activecreate',' active')
@section('content')
<div class="container text-center">
    <h2 class="text-primary"> Ajouter Une Tache</h2>
</div>
<form method="POST" action="{{route('tache.store')}}">
    @csrf 
    <div class="form-group">
      <label for="titre">Titre :</label>
      <input type="text" class="form-control mb-2" id="titre" name="titre">
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-2"></textarea>
      </div>
      <div class="form-group">
        <label for="date_echeance">Date d'echéance :</label>
        <input type="date" class="form-control mb-2" id="date_echeance" name="date_echeance" >
      </div>
      <div class="form-group">
        <label for="statut">statut :</label>
        <select name="statut" id="statut">
            <option value="en cours" name="statut">en cours</option>
            <option value="terminé" name="statut">terminé</option>
    </select>
      </div>
    <button type="submit" class="btn btn-primary mt-2">Ajouter</button>
  </form>
@endsection