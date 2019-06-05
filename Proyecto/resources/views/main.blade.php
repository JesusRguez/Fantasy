
@include('doc_header')
@include('site_header')
  <!-- Page Content -->
<div class="container">
	<div class="row">
		@include('site_menu')
		<div class="col-md-8 col-lg-9 mb-4 text-center">
			<div class="card-header">
				<div class="col-12">
					<ul class="ls-none location">
						<li class="active-text">
							<h5 class="text-custom">My fantasies</h5>
						</li>
						<li class="text-custom">
							<a href="/search">
								<h5 class="text-custom">Discover</h5>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="card-container">
				<div class="col-12 card-header-with-border">
					<h5>My fantasies</h5>
				</div>
				<hr class="barra">
				<!--Pongo un ejemplo para copiar estilos al dinamizarlo-->
				<div class="col-lg-4 col-sm-6 portfolio-item">
        				<div class="card h-100">
          					<a href="#"><img class="card-img-top" src="assets/imgs/myfantasies/cicloagua.jpg" alt=""></a>
          				<div class="card-body">
            					<h4 class="card-title">
              						<h5>Fantasía Ciclo del agua</h5>
            					</h4>
            					<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
					<hr class="barra">
					<a class="btn-fantasy nav-link" href="#">Try</a>
          				</div>
        				</div>
      				</div>

			</div>
		</div>
	</div>

</div>

@include('site_footer')
