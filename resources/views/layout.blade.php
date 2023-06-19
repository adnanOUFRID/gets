<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link @yield('activehome')" aria-current="page" href="/">Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('activeindex')" href="{{route('tache.index')}}">Liste Des Taches</a>
          </li>
          <li class="nav-item">
            <a class="nav-link @yield('activecreate')" href="{{route('tache.create')}}">Ajouter Une Tache</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
          <div class="container pt-3">
            @yield('content')
          </div>
</body>
</html>