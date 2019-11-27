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
        <li><a href="{{url('newitem')}}">Agregar</a></li>
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
            <figure>
                <button class="delete" >X</button>
              <img src="{{ asset('images/' . $item->image) }}" width="200" height="150" alt="">
              <figcaption>{{$item->text}}</figcaption>
              <figcaption>{{$item->order}}</figcaption>
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
          var beforeItemOrder =  isNaN(parseFloat($(ui.item).prev('article').attr('order'))) ? 0 : parseFloat($(ui.item).prev('article').attr('order'));
          var afterItemOrder =  isNaN(parseFloat($(ui.item).next('article').attr('order'))) ? parseFloat($(ui.item).prev('article').attr('order')) + 1 : parseFloat($(ui.item).next('article').attr('order'));
          console.log(beforeItemOrder);
          console.log(afterItemOrder);
          var newItemOrder = (beforeItemOrder + afterItemOrder) / 2;
          
          return newItemOrder;
        }
      },
    });
    $( "#sortable" ).disableSelection();

    //DELETE
    $(".delete").click(function (){
      if(confirm("desea borrar el item")){
        $( "#sortable" ).sortable( "disable" );
        var selectedItem = $(this).parent().parent();

        data = {
          id: selectedItem.attr("idItem"),
          _token: "{{ csrf_token() }}"
        }

        $.ajax({
          url: '/item',
          type: 'DELETE',
          data: data,
          success: function(response) {
            selectedItem.remove();
            //enable sortable again after save
            $("#sortable").sortable("enable");
          }
       });
      }
    });


  });
  </script>
</html>
