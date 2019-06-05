
@include('doc_header')
@include('site_header')
<div class="container fantasy-style">
   <h1 class="mt-4 mb-3 gradiant-tittle">CREATE YOUR OWN FANTASY</h1>
   <div class="pt-25"></div>
   <div class="mlr">
   <div class="row">
     <div class="col-2 menu-pactivo">
           <ul class="ls-none">

         <li><a tittle="Click to open a background selector" id="addBack" ><img class="img-fluid icon-pa" src="assets/stimey/graphics/icons/ICON-Post-File.png"></a></li>
         <li><a title="Click to create active point" id="create"><img class="img-fluid icon-pa" src="assets/stimey/graphics/icons/ICON-Review-Star-Technology.png"></a></li>
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
         <div class="modal-content">
           <div class="modal-header">
             <span class="close">&times;</span>
           </div>
           <div class="modal-body">
              <div class="row">
               <div class="col-4 offset-1">
                 <input class="jscolor {styleElement:'workspace'}" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#ffffff">
                 <input type="hidden" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#ffffff" id="hexcolor"></input>
             </div>
               <div class="col-2"> OR </div>
               <div class="col-4">
                 <input type="file" id="uploadBack">
               </div>
             </div>
           </div> <!-- /.modal-body -->

           <div class="modal-footer">
               <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               <a  class="btn btn-primary" id="save">Save changes</a>
           </div> <!-- /.modal-footer -->


           </div> <!-- /.modal-content -->

</div> <!-- /.modal -->


<div id="modalPA" class="modalWindow"> <!-- modal punto activo -->
   <div class="modal-content">
       <span class="close" id="exit">&times;</span>
       <h3 class="mt-4 mb-3 gradiant-tittle">Configure the active point</h3>
   <form action="" enctype="multipart/form-data">
   <div class="row">
     <div class="col-12 col-sm-6">
       <label class="form-label"><strong>Image</strong><input type="file" name="img"></label>

     </div>
     <div class="col-12 col-sm-6">
       <label class="form-label"><strong>Description(Image)</strong><input type="text" name="imgDescription"></label>

     </div>
     <div class="col-12 col-sm-6">
       <label class="form-label"><strong>Video url</strong><input type="text" name="videoUrl"></label>

     </div>
     <div class="col-12 col-sm-6">
       <label class="form-label"><strong>Order</strong>
       <select name="order">
           <option>1</option>
           <option>2</option>
           <option>3</option>
       </select>
       </label>

     </div>

     <div class="col-12">
       <label class="form-label"><strong>Complementary text</strong>
       <textarea rows="4" name="complementaryText">
       </textarea>
       </label>
     </div>



   </div>
   </form>
   </div>
</div>
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

<style>
.box {
 width: 40%;
 margin: 0 auto;
 background: rgba(255,255,255,0.2);
 padding: 35px;
 border: 2px solid #fff;
 border-radius: 20px/50px;
 background-clip: padding-box;
 text-align: center;
}

.overlay {
 position: fixed;
 top: 0;
 bottom: 0;
 left: 0;
 right: 0;
 background: rgba(0, 0, 0, 0.7);
 transition: opacity 500ms;
 visibility: hidden;
 opacity: 0;
}
.overlay:target {
 visibility: visible;
 opacity: 1;
}

.popup {
 margin: 70px auto;
 padding: 20px;
 background: #fff;
 border-radius: 5px;
 width: 30%;
 position: relative;
 transition: all 5s ease-in-out;
}

.popup h2 {
 margin-top: 0;
 color: #F4B12A;
 font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
 position: absolute;
 top: 20px;
 right: 30px;
 transition: all 200ms;
 font-size: 30px;
 font-weight: bold;
 text-decoration: none;
 color: #F4B12A ;
}
.popup .close:hover {
 color: #06D85F;
}
.popup .content {
 max-height: 30%;
 overflow: auto;
 color: #90D400 ;
}

@media screen and (max-width: 700px){
 .box{
   width: 70%;
 }
 .popup{
   width: 70%;
 }
}
</style>


<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<script type="text/javascript">


   var PA = "<div class='punto-Activo ui-widget-content'; ondblclick='openmodal(this);'></div>" ;
   var i = 0;
   $( "#create" ).click(function( ) {
     if(i != 10){
         $(PA).attr('id','PA'+i).appendTo( "#area" ).draggable({containment: "parent"}).resizable({ghost: true, autoHide: true}).css({"background-color": "#C5D8FF","height":"50px", "width":"50px", "max-height": "400px",  "max-height": "400px", "border": "1px solid black"});
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

 var span = document.getElementsByClassName("close")[0];

 btn.onclick = function() {
   modal.style.display = "block";
 }

 span.onclick = function() {
   modal.style.display = "none";
 }

 window.onclick = function(event) {
   if (event.target == modal) {
     modal.style.display = "none";
   }
 }

 function openmodal(elemento){
   var mod = document.getElementById('modalPA');

   var bt = document.getElementById(elemento.id);

   var sp = document.getElementById("exit");

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

</script>

 @include('site_footer')
