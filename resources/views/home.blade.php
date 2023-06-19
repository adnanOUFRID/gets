@extends('layout')
@section('title','Acceuil')
@section('activehome',' active')
@section('content')
<div class="container mt-5 p-5 bg-primary text-white rounded">
    <div class="row justify-content-center">
        <h1 class="text-center">Bienvenue Dans L'application de Gestion Des Taches</h1>
        <div class="container text-center ">
        <a href="{{route('tache.index')}}" class="btn btn-outline-secondary ">Get Started</a>
    </div>

    </div>
</div>
@endsection
