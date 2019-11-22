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
       

        {{-- iterate between all the elements, to make the list --}}
        @foreach ($items as $item)
          <article class="one_quarter" order="{{$item->order}}" idItem={{$item->id}}>
            <figure><img src="{{ asset('images/demo/215x315.gif') }}" width="200" height="150" alt="">
              <figcaption>{{$item->image}}</figcaption>
              <figcaption>{{$item->text}}</figcaption>
            </figure>
          </article>
        @endforeach

      </section>
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
<script>
  $( function() {
    $( "#sortable" ).sortable({
      update: function( event, ui ) {
        
        //disable the sort until the mongo update
        $( "#sortable" ).sortable( "disable" );

        var betweenNumber = getBetween();

        //update the order attr from the changed item
        $(ui.item).attr('order', betweenNumber);
        
        data = {
          id:$(ui.item).attr('idItem'),
          order: betweenNumber,
          _token: "{{ csrf_token() }}"
        }

        $.ajax({
          url: '/item',
          type: 'PUT',
          data: data,
          success: function(response) {
            //enable sortable again after save
            $("#sortable").sortable("enable");
          }
       });
        
        function getBetween(){
           return (parseFloat($(ui.item).prev('article').attr('order')) + parseFloat($(ui.item).next('article').attr('order'))) / 2 
        }
      },
    });
    $( "#sortable" ).disableSelection();
  });
  </script>
</html>
