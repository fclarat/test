@extends('layouts.index')

@section('section')

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
      <strong>{{ $message }}</strong>
  </div>
  @endif
  @if ($message = Session::get('error'))
  <div class="alert alert-danger alert-block">
      <strong>{{ $message }}</strong>
  </div>
  @endif
  
  <form action="/item" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label for="text">Epígrafe de la imagen</label> <br>
    <input class="ui-autocomplete-input"type="text" id="text" name="text"> <br><br>
    <label for="image">Imagen</label> <br>
    <input class="ui-button ui-widget ui-corner-all" type="file" id="image" name="image"><br><br>
    <button class="ui-button ui-widget ui-corner-all" type="submit">Agregar</button>
  </form>
@endsection
