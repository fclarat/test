@extends('layouts.index')

@section('section')

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-block">
      <strong>{{ $message }}</strong>
  </div>
  @endif
  @if (count($errors) > 0)
    @foreach($errors->all() as $error)
      <div class="alert alert-danger alert-block">
        {{$error}}<br>
      </div>
    @endforeach
  @endif

  
  <form action="/item" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <label for="text">Image text*</label> <br>
    <input class="ui-autocomplete-input"type="text" id="text" name="text"> <br><br>
    <label for="image">Image*</label> <br>
    <input class="ui-button ui-widget ui-corner-all" type="file" id="image" name="image"><br><br>
    <button class="ui-button ui-widget ui-corner-all" type="submit">Add</button>
  </form>
@endsection
