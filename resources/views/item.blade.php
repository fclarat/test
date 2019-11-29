@extends('layouts.index')

@section('section')

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

@endsection

@section('script')
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
          url: 'api/item',
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
          url: 'api/item',
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
  @endsection