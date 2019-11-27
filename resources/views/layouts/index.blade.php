<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="{{ asset('js/jquery.min.js') }}"></script>
        <script src="{{ asset('js/jqueryui.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('css/jqueryui.css') }}">
        <link rel="stylesheet" href="{{ asset('css/boostrap.css') }}">

        <link rel="stylesheet" href="{{ asset('css/layout.css') }}">

        <title>Test</title>
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
        <li><a href="{{url('')}}">Listado</a></li>
        <li><a href="{{url('newitem')}}">Agregar</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper row2">
  <div id="container" class="clear">
    <div id="homepage">
    <section id="sortable" class="clear">
        @yield("section")
     </section>
    </div>
</div>

<div id="footer">
<p><a target="_blank" href="https://www.linkedin.com/in/fclarat/" >Facundo Clarat LinkedIn</a></p>
</div>
</body>
    @yield("script")
</html>
