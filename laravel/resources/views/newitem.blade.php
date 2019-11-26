<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="{{ asset('layout.css') }}">

        <title>Laravel</title>
    </head>
    <body>
        
    <div class="wrapper row1">
  <header id="header" class="clear">
    <div id="hgroup">
      <h1><a href="#">Test</a></h1>
      <h2>Test</h2>
    </div>
    <nav>
      <ul>
        <li><a href="#">Listado</a></li>
        <li><a href="#">Agregar</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper row2">
  <div id="container" class="clear">
    <div id="homepage">
      <section id="sortable" class="clear">
        <form action="/item" method="POST" enctype="multipart/form-data">
          @csrf
          @method('POST')
          <label for="text">Epígrafe de la imagen</label> <br>
          <input class="ui-autocomplete-input"type="text" id="text" name="text"> <br><br>
          <label for="image">Imagen</label> <br>
          <input class="ui-button ui-widget ui-corner-all" type="file" id="image" name="image"><br><br>
          <button class="ui-button ui-widget ui-corner-all" type="submit">Upload</button>
      </form>


      </section>
     
    </div>
  </div>
</div>


<!-- Footer -->
<div class="wrapper row3">
  <footer id="footer" class="clear">
    <p class="fl_left">Copyright &copy; 2018 - All Rights Reserved - <a href="#">Domain Name</a></p>
    <p class="fl_right">Template by <a target="_blank" href="https://www.os-templates.com/" title="Free Website Templates">OS Templates</a></p>
  </footer>
</div>
</body>
</html>
