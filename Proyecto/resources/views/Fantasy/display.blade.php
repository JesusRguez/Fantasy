@extends('layout.general')
@section('content')
<div class="container fantasy-style">
  @if($data['fantasy'])
  <h1 class="mt-4 mb-3 gradiant-tittle">{{$data['fantasy']->name}}</h1>
  @endif
  <div class="pt-25"></div>
  <div class="mlr">
    <div class="row">

      <div id="workspace" class="col-9 offset-custom ui-widget-content ">
        <div id="area" class="row">

        </div>
      </div>
    </div>

  </div>

</div>


@if($data['fantasy'])
<script>
$('#_token').val('{{$data['fantasy']->token}}');
$('#name').val('{{$data['fantasy']->name}}');
@if($data['fantasy']->backgroundImage)
$('#area').css('background','url(../../{{$data['fantasy']->backgroundImage}})');
@endif
@if($data['fantasy']->backgroundColor)
$('#area').css('background','#{{$data['fantasy']->backgroundColor}}');
@endif

</script>
@endif


@foreach ($data['activepoints'] as $activepoint)
<script>
var token_ap = {{$activepoint->token}};
var PA = '{!!$activepoint->html!!}';
console.log(PA);
//data-toggle="modal" data-target="#displayModal";
$(PA).attr('id', token_ap).appendTo( "#area" );
$(PA).prop("ondblclick", null);
$(PA).prop("data-toggle", "modal");
$(PA).prop("data-target", "displayModal"+{{$activepoint->token}});
</script>
<button id="btnDisplayModal{{$activepoint->token}}" type="hidden" class="invisible" data-toggle="modal" data-target="#displayModal{{$activepoint->token}}"></button>

<div id="displayModal{{$activepoint->token}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <div class="row col-12">
          <div class="col-11 text-center">
            <h4 class="fs-subtitle2">{{$activepoint->title}}</h4>
          </div>
          <div class="col-1">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="row col-8 offset-2">
          @if($activepoint->video)
          <div class="col-12 text-center">
			<h2 class="fs-subtitle">Watch a video!</h2>
            <iframe src="https://www.youtube.com/embed/{{$activepoint->video}}" width="100%" height="270" allowfullscreen="allowfullscreen"
        mozallowfullscreen="mozallowfullscreen" 
        msallowfullscreen="msallowfullscreen" 
        oallowfullscreen="oallowfullscreen" 
        webkitallowfullscreen="webkitallowfullscreen"></iframe>
          </div>
          @endif

          @if($activepoint->text)
          <div class="col-11 text-center text-center">
			<h2 class="fs-subtitle mt-5 pt-2">Description</h2>
            <div>{!!$activepoint->text!!}</div>
          </div>
          @endif

          @if($activepoint->audio)
          <div class="col-11 text-center mt-5 pt-2">
			<h2 class="fs-subtitle">Listen about {{$activepoint->title}}</h2>
            <audio controls>
             <source src="../{{$activepoint->audio}}" type="audio/mpeg">
            Your browser does not support the
            <code>audio</code> element.
          </audio>
        </div>
        @endif
      </div>
    </div>
    <div class="modal-footer">
      <button  type="submit" class="botonquiz" data-dismiss="modal">Start a Quiz!</button>
    </div>
  </div>

</div>
</div>
@endforeach

<script>
function openmodal(elemento, tokenap){
  $('#btnDisplayModal'+tokenap).click();
}

</script>

<style type="text/css">
  .punto-Activo{
    border: transparent !important;
  }

  .ui-icon-gripsmall-diagonal-se{
    display: none !important;
  }
</style>

@endsection
