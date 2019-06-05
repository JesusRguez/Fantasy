@extends('layout.general')
@section('content')
<div class="container fantasy-style">
  <h1 class="mt-4 mb-3 gradiant-tittle">CREATE YOUR OWN FANTASY</h1>
  <div class="pt-25"></div>
  <div class="mlr">
    <div class="row">
      <div class="col-2 menu-pactivo">
        <ul class="ls-none">

          <li><a tittle="Click to open a background selector" id="addBack" ><img class="img-fluid icon-pa" src="{{ asset('assets/stimey/graphics/icons/ICON-Post-File.png') }}"></a></li>
          <li><a title="Click to create active point" id="create"><img class="img-fluid icon-pa" src="{{ asset ( 'assets/stimey/graphics/icons/ICON-Review-Star-Technology.png') }} "></a></li>
        </ul>

      </div>

      <div id="workspace" class="col-9 offset-1 ui-widget-content ">
        <div id="area" class="row">

        </div>
      </div>
    </div>

  </div>

</div>

</div>


<div id="modalBack" class="modalWindow">
  <!-- multistep form -->
  <form id="upload_form" enctype="multipart/form-data">
    <!-- progressbar -->
    <ul id="progressbar">
      <li class="active">Name-Image</li>
      <li>Thopic-Description-State</li>
      <li>Background</li>
    </ul>
    <!-- fieldsets -->
    <fieldset>
      <h3 class="fs-subtitle">Name</h3>
      <input id="name" name="name" type="text" placeholder="Fantasy name">
      <h3 class="fs-subtitle">Image</h3>
      <input type="file" id="mainImg" accept="image/png">
      <span id="uploaded_image"> </span>
      <form id="upload_form" enctype="multipart/form-data">

        <h3 class="fs-subtitle">Create your own image</h3>
        <a class="boton_personalizado" onclick="href='https://pixlr.com/'" target=”_blank”>Create your own image</a>

        <input type="hidden" id="_token" value="<?php echo date("YmdHis"); ?>" >

        <input type="button" name="next" class="next action-button" value="Next" />
      </fieldset>


      <fieldset>
        <h3 class="fs-subtitle">Thematic</h3>
        <select class="boton_personalizado" name="theme">
          <option value="Theme" disabled selected>Theme</option>
          <option value="mathematics"> Mathematics</option>
          <option value="science"> Science</option>
          <option value="engineer"> Engineer</option>
          <option value="innovation"> Innovation</option>
          <option value="technology"> Technology</option>
          <option value="physics"> Physics</option>
          <option value="chemistry"> Chemistry</option>
          <option value="biology"> Biology</option>
          <option value="computer science"> Computer Science</option>
        </select>
        <h3 class="fs-subtitle">Difficulty</h3>
        <select class="boton_personalizado" name="theme">
          <option value="easy" selected>Easy</option>
          <option value="medium"> Medium</option>
          <option value="hard"> Hard</option>
          <option value="challenge"> Challenge</option>
        </select>
        <h3 class="fs-subtitle">Privacy</h3>
        <select class="boton_personalizado" name="privacy">
          <option value="public" selected> Public</option>
          <option value="semipublic"> Semi-Public</option>
          <option value="private"> Private</option>
        </select>
        <h3 class="fs-subtitle">Description</h3>
        <div id="editorFantasy">

        </div>


        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
      </fieldset>
      <fieldset>
        <h2 class="fs-subtitle">Background color</h2>
        <input type="hidden" id="_token" value="<?php echo date("YmdHis"); ?>" >
        <input name="color" type="hidden" id="color_value">
        <button class="jscolor {valueElement: 'color_value' }">Pick a color</button>
        <h2 class="fs-subtitle">Select background image</h2>
        <input type="file" id="imgBack"/>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <button type="submit" class="submit action-button" id="ajaxSubmit"> Save Changes </button>
        <span id="closeA" class="btn btn-default" data-dismiss="modal" ></span>
      </fieldset>
    </form>
  </div>


  <div id="modalPA" class="modalWindow"> <!-- modal punto activo -->
    <form id="upload_form_PA" enctype="multipart/form-data">
      <ul id="progressbar">
        <li class="active">Image</li>
        <li>Resources</li>
        <li>Quiz</li>
      </ul>
      <fieldset>
      <input id="id_pa_modal" type="hidden">
        <div class="col-12">
          <label class="form-label"><strong>Image of active Point</strong><input type="file" name="img"></label>
        </div>
        <div class="col-12">
          <label class="form-label"><strong>Order</strong>
            <select name="order">
              <option>1</option>
              <option>2</option>
              <option>3</option>
            </select>
          </label>
        </div>
        <span id="closeAB" class="btn btn-default" data-dismiss="modal" ></span>
        <input type="button" name="next" class="next action-button" value="Next" />
      </fieldset>


      <fieldset>
        <div class="col-12">
          <label class="form-label"><strong>Audio</strong><input type="file" name="audio"></label>
        </div>

        <div class="col-12">
          <label class="form-label"><strong>Name</strong><input id="id_name_pa" type="text" name="namePA"></label>

        </div>

        <div class="col-12">
          <label class="form-label"><strong>Complementary Text</strong><input id="complementaryText" type="text" name="complementaryText"></label>
        </div>
        <div class="col-12">
          <label class="form-label"><strong>Video url</strong><input type="text" name="videoUrl"></label>
        </div>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
      </fieldset>

      <fieldset>
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <button type="submit" class="submit action-button" id="ajaxSubmitPA"> Save active point </button>
      </fieldset>



    </form>
  </div> <!-- /.modal -->


  <div class="box invisible">
    <a id="alerta1" class="button" href="#popup1">Let me Pop up</a>
  </div>

  <div id="popup1" class="overlay">
    <div class="popup">
      <h2>Sorry!</h2>
      <a class="close" href="#">&times;</a>
      <div class="content">
        You can't add more active points!
      </div>
    </div>
  </div>


  <script type="text/javascript">


  var PA = "<div class='punto-Activo ui-widget-content'; ondblclick='openmodal(this);'></div>" ;
  var i = 0;
  $( "#create" ).click(function( ) {
    if(i != 10){
      $(PA).attr('id',i).appendTo( "#area" ).draggable({containment: "parent"}).resizable({ghost: true, autoHide: true}).css({"background-color": "#C5D8FF","height":"50px", "width":"50px", "max-height": "400px", "max-height": "400px", "border": "1px solid black"});
      i++;
    } else{
      x = window.location.href;
      window.location.href = "#popup1";
      window.location.replace = x;
    }
  });

  //modal background script

  var modal = document.getElementById('modalBack');
  var btn = document.getElementById("addBack");

  var a = document.getElementById('closeA');
  var span = document.getElementsByClassName("close")[0];

  btn.onclick = function() {
    modal.style.display = "block";
  }

  span.onclick = function() {
    modal.style.display = "none";
  }

  a.onclick = function(){
    modal.style.display = "none";
  }

  var modalPA = document.getElementById('modalPA');
  var ab = document.getElementById('ajaxSubmitPA');
  var modalPA = document.getElementById('modalPA');
    ab.onclick = function(){
    modalPA.style.display = "none";
  }
    ab.onclick = function(){
    modalPA.style.display = "none";
  }



  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

  function openmodal(elemento){
    var mod = document.getElementById('modalPA');
    $('#id_pa_modal').val(elemento.id);
    var bt = document.getElementById(elemento.id);


    bt.ondblclick = function() {
      mod.style.display = "block";
    }

    sp.onclick = function() {
      mod.style.display = "none";
    }

    window.onlclick = function(event) {
      if (event.target == modal) {
        mod.style.display = "none";
      }
    }
  }


  function posicion(div) {
    var elemento = $(".midiv");
    var posicion = elemento.position();
    alert( "left: " + posicion.left + ", top: " + posicion.top );
  }

  function submit(ruta){
    if( document.getElementById("imgBack").files.length == 0 ){
      var color = document.getElementById('color_value').value;
      document.getElementById('area').style.background = '#'+color;
    }
    else{
      $('#area').css('background', ruta);
    }
  }

  $( document ).ready(function() {
    btn.click();
  });


  jQuery(document).ready(function(){
    jQuery('#ajaxSubmit').click(function(e){
      e.preventDefault();
      var name = $('#name').val();
      var token = $('#_token').val();
      var backgroundImage = $('#imgBack').prop('files')[0];
      var backgroundColor = $('#color_value').val();
      var mainImage = $('#mainImg').prop('files')[0];
      var description = $('.ql-editor').html();

      var form_data = new FormData();

      form_data.append('name',name);
      form_data.append('token',token);
      form_data.append('backgroundImage',backgroundImage);
      form_data.append('mainImage', mainImage);
      form_data.append('backgroundColor', backgroundColor);
      form_data.append('action','create');
      form_data.append('description', description);

      for (var pair of form_data.entries()) {
        console.log(pair[0]+ ', ' + pair[1]);
      }
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: "{{ url('/fantasy/create') }}",
        method: 'post',
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        data: form_data,
        success:function(data)
        {
          window.location.href = data.url;
          /*if(data.backgroundImage)
          {
            $('#area').attr('style','');
            $('#area').css('background', "url('"+data.backgroundImage+'?'+Math.random()  +"')");
          }
          if(data.backgroundColor){
            $('#area').attr('style','');
            $('#area').css('background', "#"+data.backgroundColor);
          }*/
        }});
      });
    });



    jQuery(document).ready(function(){
      jQuery('#ajaxSubmitPA').click(function(e){
        e.preventDefault();
        var name = $('#id_name_pa').val();
        var token = $('#_token').val();
        /*var token = $('#_token').val();
        var backgroundImage = $('#imgBack').prop('files')[0];
        var backgroundColor = $('#color_value').val();
        var mainImage = $('#mainImg').prop('files')[0];
        var description = $('.ql-editor').html();



        form_data.append('name',name);
        form_data.append('token',token);
        form_data.append('backgroundImage',backgroundImage);
        form_data.append('mainImage', mainImage);
        form_data.append('backgroundColor', backgroundColor);
        form_data.append('action','create');

        for (var pair of form_data.entries()) {
        console.log(pair[0]+ ', ' + pair[1]);
        }*/
        var form_data = new FormData();
        form_data.append('title',name);
        form_data.append('tokenFantasy',token)

      //alert("PA");
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      jQuery.ajax({
        url: "{{ url('/activepoint/create') }}",
        method: 'post',
        contentType: false, // The content type used when sending data to the server.
        cache: false, // To unable request pages to be cached
        processData: false,
        data: form_data,
        success:function(data)
        {
          
          /*if(data.backgroundImage)
          {
            $('#area').attr('style','');
            $('#area').css('background', "url('"+data.backgroundImage+'?'+Math.random()  +"')");
          }
          if(data.backgroundColor){
            $('#area').attr('style','');
            $('#area').css('background', "#"+data.backgroundColor);
          }*/
        }});
      });
    });




    //editor
    hljs.configure({
      useBR: false,
      languages: ['javascript', 'ruby', 'python', 'html', 'c++', 'c', 'java', 'css']
    });


    var quill = new Quill('#editorFantasy', {
      modules: {
        toolbar: [
          [{ header: [5, 6, false] }],
          ['bold', 'italic', 'underline'],
          ['code-block', 'align', 'formula', 'list']
        ]
      },
      syntax: true,
      theme: 'snow'
    });




    //modal Main


    //jQuery time
    var current_fs, next_fs, previous_fs; //fieldsets
    var left, opacity, scale; //fieldset properties which we will animate
    var animating; //flag to prevent quick multi-click glitches

    $(".next").click(function(){
      if(animating) return false;
      animating = true;

      current_fs = $(this).parent();
      next_fs = $(this).parent().next();

      //activate next step on progressbar using the index of next_fs
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      //show the next fieldset
      next_fs.show();
      //hide the current fieldset with style
      current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
          //as the opacity of current_fs reduces to 0 - stored in "now"
          //1. scale current_fs down to 80%
          scale = 1 - (1 - now) * 0.2;
          //2. bring next_fs from the right(50%)
          left = (now * 50)+"%";
          //3. increase opacity of next_fs to 1 as it moves in
          opacity = 1 - now;
          current_fs.css({
            'transform': 'scale('+scale+')',
            'position': 'absolute'
          });
          next_fs.css({'left': left, 'opacity': opacity});
        },
        duration: 800,
        complete: function(){
          current_fs.hide();
          animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
      });
    });

    $(".previous").click(function(){
      if(animating) return false;
      animating = true;

      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

      //de-activate current step on progressbar
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

      //show the previous fieldset
      previous_fs.show();
      //hide the current fieldset with style
      current_fs.animate({opacity: 0}, {
        step: function(now, mx) {
          //as the opacity of current_fs reduces to 0 - stored in "now"
          //1. scale previous_fs from 80% to 100%
          scale = 0.8 + (1 - now) * 0.2;
          //2. take current_fs to the right(50%) - from 0%
          left = ((1-now) * 50)+"%";
          //3. increase opacity of previous_fs to 1 as it moves in
          opacity = 1 - now;
          current_fs.css({'left': left});
          previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
        },
        duration: 800,
        complete: function(){
          current_fs.hide();
          animating = false;
        },
        //this comes from the custom easing plugin
        easing: 'easeInOutBack'
      });
    });

    $(".submit").click(function(){
      return false;
    })

    </script>

    @endsection
