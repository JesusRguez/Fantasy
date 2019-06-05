<?php
    include 'includes/doc_header.php';
    include 'includes/site_header.php';
?>
 <div>
  <div class="container fantasy-style">
    <h1 class="mt-4 mb-3 gradiant-tittle">CREATE YOUR OWN FANTASY</h1>
    <div class="pt-25"></div>
    <div class="mlr">
  	<div class="row"> 
  		<div class="col-2 menu-pactivo">
            <ul class="ls-none">
                
		    	<li><a id="addBack" ><img class="img-fluid icon-pa" src="assets/imgs/create-fantasy/bg-icon.png"></a></li>
		    	<li><a id="create"><img class="img-fluid icon-pa" src="assets/imgs/create-fantasy/ap-icon.png"></a></li>
		    </ul>
		    
		</div>

		<div id="workspace" class="col-9 offset-1 ui-widget-content">
		    <div id="area">
		    	<div id="modalBack" class="modalWindow" style="display: none;">
				  <div class="modal-content">
				    <span class="close">&times;</span>
				    <input type="color" id="colorpicker" name="color" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#ffffff">
				    <input type="hidden" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" value="#ffffff" id="hexcolor"></input>

				    <button id="saveChange"> Save Change</button>
			  		</div>

				</div>
		    </div>
	    </div>
	</div>

	</div> 

	   	

  </div>
  

  </div>

<script type="text/javascript">
  
      var i = 0;
    $( "#create" ).click(function( ) {
    	// Deberiamos de crear los PA de forma que no se viera este morcillon de codigo
        
        $( "<div class='ui-widget-content' style='border-radius: 200px; height: 																	200px; width: 200px;'><span></span></div>" ).attr('id','PA'+i).appendTo( "#area" ).draggable({ containment: "parent"}).resizable();
        i++;
      });
  
    //modal script

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

	$('#colorpicker').on('change', function() {
		$('#colorpicker').attr('value', this.value);
		$('#hexcolor').attr('value', this.value);
	});

	$('#saveChange').click(function ( ) {
		$('#workspace').css("background-color", $('#hexcolor').val());
	});

</script>

<?php
    include 'includes/site_footer.php';
?>