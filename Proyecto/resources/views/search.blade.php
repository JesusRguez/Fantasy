
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
						<li class="text-custom">
							<a href="/">
								<h5 class="text-custom">My fantasies</h5>
							</a>
						</li>
						<li class=" active-text">
								<h5 class="text-custom">Discover</h5>
						</li>
					</ul>
				</div>
			</div>

			<form>
			<div class="card-container">
				<div class="col-12 card-header-with-border">
					<div class="card-body">
            					<div class="input-group">
              						<input type="text" class="form-control" placeholder="Search for...">
              					<span class="input-group-btn">
                				<button class="btn btn-secondary" type="button">Go!</button>
              					</span>
            				</div>
          			</div>
				</div>



      <div class="row">
      <div class="col-6">
	<div class="pt-20">
		<div class="w-100"><span class="font-weight-bold">Theme</span>
		</div>
		<hr class="barra">

		<div class="w-100 filter-input" ><input type="checkbox" value="mathematics"> <span>Mathematics</span></div>
		<div class="w-100 filter-input" ><input type="checkbox" value="science"> <span>Science </span></div>
		<div class="w-100 filter-input" >	<input type="checkbox" value="engineer"> <span> Engineer </span></div>
		<div class="w-100 filter-input" ><input type="checkbox" value="innovation"> <span>Innovation </span></div>
		<div class="w-100 filter-input" ><input type="checkbox" value="technology"> <span> Technology</span></div>
		<div class="w-100 filter-input" ><input type="checkbox" value="physics"> <span>Physics</span></div>
		<div class="w-100 filter-input" ><input type="checkbox" value="chemistry"> <span>Chemistry</span></div>
		<div class="w-100 filter-input" ><input type="checkbox" value="biology"> <span>Biology</span></div>
		<div class="w-100 filter-input" ><input type="checkbox" value="computer science"> <span> Computer Science</span></div>

	</div>
      </div>

      <div class="col-6">
	<div class="pt-20">
		<div class="w-100"><span class="font-weight-bold">Difficulty </span>
		</div>
		<hr class="barra">

		<div class="w-100 filter-input" ><input type="checkbox" value="easy"> <span>Easy</span></div>
		<div class="w-100 filter-input" ><input type="checkbox" value="medium"> <span>Medium </span></div>
		<div class="w-100 filter-input" >	<input type="checkbox" value="difficult"> <span> difficult </span></div>
		<div class="w-100 filter-input" ><input type="checkbox" value="challenge"> <span>Challenge </span></div>
	</div>
      </div>



	</form>


      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="assets/imgs/myfantasies/universo.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Fantasía universo</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="/assets/imgs/myfantasies/paises.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Fantasía paises</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos quisquam, error quod sed cumque, odio distinctio velit nostrum temporibus necessitatibus et facere atque iure perspiciatis mollitia recusandae vero vel quam!</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="assets/imgs/myfantasies/roma.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Fantasía historia romana</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="/assets/imgs/myfantasies/ciencia.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Fantasía ciencias</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae.</p>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <a href="#"><img class="card-img-top" src="/assets/imgs/myfantasies/rio.jpg" alt=""></a>
          <div class="card-body">
            <h4 class="card-title">
              <a href="#">Fantasía ríos</a>
            </h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque earum nostrum suscipit ducimus nihil provident, perferendis rem illo, voluptate atque, sit eius in voluptates, nemo repellat fugiat excepturi! Nemo, esse.</p>
          </div>
        </div>
      </div>
    </div>
</div>
    <!-- /.row -->

    <!-- /.row -->


    <!-- Call to Action Section -->

  </div>
</div>
</div>
  <!-- /.container -->
@include('site_footer')
