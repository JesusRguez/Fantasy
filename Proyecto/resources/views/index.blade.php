@extends('layout.general')
@section('content')
<!-- Page Content -->
<section>
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
						<h5><img src="{{asset('assets/stimey/graphics/icons/ICON-PROFILE_circle.png')}}" class="img-fluid icon-pa"> My Fantasies</h5>
					</div>
					<hr class="barra">
					<div class="row">
						@if($fantasies->count())
						@foreach ($fantasies as $fantasy)
						<!--Pongo un ejemplo para copiar estilos al dinamizarlo-->
						<div class="col-lg-4 col-sm-6 portfolio-item">
							<div class="card h-100">
								@if(!$fantasy->image)
								<a href="#"><img class="card-img-top" src="{{ asset ('assets/stimey/stimyverse/CRASH PLANET_Landscape_02.png') }}" alt=""></a>
								@else
								<a href="#"><img class="card-img-top" src="{{$fantasy->image}}" alt=""></a>
								@endif

								<div class="card-body">
									<h4 class="card-title">
										<h5>{{$fantasy->name}}</h5>
									</h4>
									@if($fantasy->description)
									<div id="fant-desc" class="card-text">
										{!! $fantasy->description !!}
									</div>

									@else
									<p class="card-text">This fantasy does not have a description</p>
									@endif
									<hr class="barra">
									<!--<a class="btn-fantasy nav-link" href="#">Try</a>-->
									<div class="mt-3">
										<div class="clearfix custom-display">
											<a class="btn btn-primary btn-xs btn-edit" href="{{action('FantasyController@edit', $fantasy->id)}}" ><span></span><img src="{{asset('assets/stimey/graphics/icons/BTN-Edit-circle.png')}}" class="icon-header"></a>
											<form action="{{action('FantasyController@destroy', $fantasy->id)}}" method="post">
												{{csrf_field()}}
												<input name="_method" type="hidden" value="DELETE">
												<button class="btn btn-danger btn-xs btn-delete" type="submit"><span><img src="{{asset('assets/stimey/graphics/icons/ICON_Delete-Post.png')}}" class="icon-header"></span></button>
											</form>
										</div>
										<div class="mt-3">
											<a tittle="Play this fantasy" class="btn-fantasy nav-link" href="{{action('GameController@show', $fantasy->id)}}"><span><img src="{{asset('assets/stimey/graphics/icons/ICON_SERIOUS-GAMES_square.png')}}" class="icon-header"></span></a>
										</div>

									</div>
								</div>
							</div>
						</div>
						@endforeach
						@else
						<h4></h4>
						<div class="container">
							<hr></hr>
							<h5> You haven't create any fantasy yet !</h5>
							<hr></hr>
						</div>
						@endif
					</div>

					<div class="col-12 card-header-with-border">
						<h5><img src="{{asset('assets/stimey/graphics/icons/ICON-Progress_Thumb-up-badge.png')}}" class="img-fluid icon-pa"> Active Fantasies</h5>
					</div>
					<hr class="barra">
					<div class="col-lg-4 col-sm-6 portfolio-item">
						<div class="card h-100">
							<a href="#"><img class="card-img-top" src="assets/imgs/myfantasies/cicloagua.jpg" alt=""></a>
							<div class="card-body">
								<h4 class="card-title">
									<h5>Fantasía Ciclo del agua</h5>
								</h4>
								<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet numquam aspernatur eum quasi sapiente nesciunt? Voluptatibus sit, repellat sequi itaque deserunt, dolores in, nesciunt, illum tempora ex quae? Nihil, dolorem!</p>
								<hr class="barra">
								<a class="btn-fantasy nav-link" href="{{action('GameController@show', '666')}}">Try</a>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>

	</div>
</section>
@endsection
