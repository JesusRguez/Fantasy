
@include('doc_header')
@include('site_header')

  <!-- Page Content -->
  <div class="container fantasy-style">

    <!-- Page Heading/Breadcrumbs -->
    <h1 class="mt-4 mb-3 gradiant-tittle">*TITULO FANTASIA*
      <small>*SUBITUTLO*</small>
    </h1>

    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="/profile">*MIS FANTASIAS*</a>
      </li>
      <li class="breadcrumb-item active">*TITULO FANTASIA ACTUAL*</li>
    </ol>

    <!-- Portfolio Item Row -->
    <div class="row">

      <div class="col-md-8">
        <img class="img-fluid" src="http://placehold.it/750x500" alt="">
      </div>

      <div class="col-md-4">
        <h3 class="my-3">Project Description</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies, justo eu convallis placerat, felis enim.</p>
        <h3 class="my-3">Project Details</h3>
        <ul>
          <li>Lorem Ipsum</li>
          <li>Dolor Sit Amet</li>
          <li>Consectetur</li>
          <li>Adipiscing Elit</li>
        </ul>
      </div>

      <div class="col-12 pt-25">
          <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-12 col-sm-4">
            <a class="btn btn-lg btn-secondary btn-block" href="#">Edit it</a>
        </div>
        <div class="col-sm-4"></div>
        </div>
      </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <!-- EN PRINCIPIO ESTO PODRIA SER UTIL PARA MAS INFO
	<h3 class="my-4">Related Projects</h3>

    <div class="row">

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

      <div class="col-md-3 col-sm-6 mb-4">
        <a href="#">
          <img class="img-fluid" src="http://placehold.it/500x300" alt="">
        </a>
      </div>

    </div>
	-->


    <!-- /.row -->

  </div>
  <!-- /.container -->

@include('site_footer')
