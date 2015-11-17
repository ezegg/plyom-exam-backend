<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AuthLaravelSimple</title>
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <link href="{{ asset('css/dash.css') }}" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
  @import url(//fonts.googleapis.com/css?family=Lato:700);
  </style>
</head>
<body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">AuthLaravelSimple</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Dashboard</a></li>
            <li><a href="#">Settings</a></li>
            <li>
              <a class="navbar-collapse collapse">
                <div>
                  @if (Auth::check())
                  <ul class="nav navbar-nav pull-right">
                    <li class="dropdown">
                      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="icon icon-wh i-profile"></span> {{ Auth::user()->username }}  <span class="caret"></span>
                      </a>
                      <ul class="dropdown-menu">

                        <li><div onclick="showView('updateUser','ocultar')">Editar usuario</li>
                        <li><a href="{{ action('AuthController@logout') }}">Salir</a></li>
                      </ul>
                    </li>
                  </ul>
                  @endif
                </div>
              <a>
            </li>

          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="Search...">
          </form>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">

        <section id="main" class=" ocultar">

          <div class="card-panel teal lighten-2">This project use Youtube API
            <!--<button onclick="auth();">Authorize</button>
            <div id="login-container" class="pre-auth">This application requires access to your YouTube account.
              Please <a href="#" id="login-link">authorize</a> to continue.
            </div>-->
            <div class="fixed-action-btn horizontal" style="bottom: 45px; right: 24px;">
              <a class="btn-floating btn-large red">
                <i class="large material-icons" id="playlist-button" disabled onclick="showCreatePlaylist()">playlist_add</i>
              </a>
            </div>
          </div>
          <div id="video-container" class="row"></div>

        </section>

        <section id="updateUser" class=" ocultar" style="display:none" >
          <div class="col-md-4 col-md-offset-4">
            <img class="img-circle" src="{{asset(Auth::user()->avatar->url('thumb')) }}" >

            {{ Form::open(['route' => 'uploadImage', 'method' => 'POST', 'files' => true,'role' => 'form']) }}
              {{ Form::hidden('id', Auth::user()->id ) }}
              {{ Form::file('avatar') }}
              <input type="submit" value="Subir imagen" class="btn btn-success">
              {{ Form::close() }}

              {{ Form::open(['route' => 'updateUser', 'method' => 'POST', 'role' => 'form']) }}

                {{ Form::hidden('id', Auth::user()->id ) }}

                {{ Form::label('first_name', 'FirtsName', ['class' => 'sr-only']) }}
                {{ Form::text('first_name', Auth::user()->first_name , ['class' => 'form-control', 'placeholder' => 'Firstname', 'autofocus' => '']) }}


                {{ Form::label('last_name', 'Last Name', ['class' => 'sr-only']) }}
                {{ Form::text('last_name', Auth::user()->last_name , ['class' => 'form-control', 'placeholder' => 'Last Name', 'autofocus' => '']) }}

                {{Form::text('email', Auth::user()->email ,['class' => 'form-control', 'placeholder' => 'Email', 'autofocus' => ''])}}

                {{ Form::label('password', 'Password', ['class' => 'sr-only']) }}
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}

              <p>
                <input type="submit" value="Actualizar" class="btn btn-success">
              </p>
              {{ Form::close() }}
          </div>
        </section>

        <!-- Modal Structure -->
        <div id="modal1" class="modal">
          <div class="modal-content">
            <div class="comments"></div>
          </div>
          <div class="modal-footer">
            <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat"></a>
          </div>
        </div>

        <!-- Modal Structure -->
        <div id="modal2" class="modal modal-fixed-footer">
          <div class="modal-content">
            <div id="buttons">
                <input placeholder="Title" id="title" type="text" class="validate">
                <label for="first_name">Title</label>
                <input placeholder="Description" id="description" type="text" class="validate">
                <label for="first_name">Description</label>
                <br>
                <button id="playlist-button" onclick="createPlaylist()" class="btn modal-action modal-close waves-effect waves-green btn-flat ">Create a new Playlist</button>
          </div>
        </div>

      </div>
    </div>

</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="{{ asset('bootstrap-3.2.0/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('bootstrap-3.2.0/js/docs.min.js') }}"></script>
<script src="{{ asset('js/dash.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script src="https://apis.google.com/js/client.js?onload=googleApiClientReady"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.3/js/materialize.min.js"></script>

</html>
