@extends('layout.main')

@section('content')
    <!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> About Us</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/">Home</a>
					</li>
					<li class="breadcrumb-item active"> About Us </li>
				</ol>
			</div>
		</div>
	</div>

    <div class="container">
		<!-- About Content -->
		<div class="about-main">
			<div class="row">
				<div class="col-lg-6">
					<img class="img-fluid rounded mb-4" src="{{ asset('storage/' . $abouts[0]->image) }}" alt="" />
				</div>
				<div class="col-lg-6">
					<h2>{{ $abouts[0]->title }}</h2>
					<p>{!! $abouts[0]->desc !!}</p>
				</div>
			</div>
			<!-- /.row -->
		</div>
	</div>
	<div class="about-inner">
		<div class="container">
			<div class="row mb-4">
				<div class="col-lg-6">
					<div class="left-ab">
						<h3>{{ $abouts[1]->title }}</h3>
						<p>{!! $abouts[1]->desc !!}</p>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="right-ab">
						<img class="img-fluid rounded mb-4" src="{{ asset('storage/' . $abouts[1]->image) }}" alt="" />
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<div class="right-ab">
						<img class="img-fluid rounded mb-4" src="{{ asset('storage/' . $abouts[2]->image) }}" alt="" />
					</div>
				</div>
				<div class="col-lg-6">
					<div class="left-ab">
						<h3>{{ $abouts[2]->title }}</h3>
						<p>{!! $abouts[2]->desc !!}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<!-- Team Members -->
		<div class="team-members-box">  
			<h2>Our Team</h2>
			<div class="row">
				@foreach ($teams as $team)	
					<div class="col-lg-4 mb-4">
						<div class="card h-100 text-center">
							<div class="our-team">
								<img class="img-fluid" src="{{ asset('storage/' . $team->image) }}" alt="" />
								<div class="team-content">
									<h3 class="title">{{ $team->name }}</h3>
									<span class="post">{{ $team->profession }}</span>
									<ul class="social">
										<li><a href="{{ $team->linkFB }}"><i class="fab fa-facebook"></i></a></li>
										<li><a href="{{ $team->linkGoogle }}"><i class="fab fa-google-plus"></i></a></li>
										<li><a href="{{ $team->linkTwitter }}"><i class="fab fa-twitter"></i></a></li>
										<li><a href="{{ $team->LInkedln }}"><i class="fab fa-linkedin"></i></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<!-- /.row -->
		</div>
	</div>
	
	<div class="customers-box"> 
		<div class="container">
			<!-- Our Customers -->
			<h2>Our Customers</h2>
			<div class="row">
				<div class="col-lg-12">
					<div id="customers-slider" class="owl-carousel">
						@foreach ($customers as $customer)	
							<div class="mb-4">
								<img class="img-fluid" src="{{ asset('storage/' . $customer->image) }}" alt="{{ $customer->imgName }}" />
							</div>
						@endforeach
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	
	<!-- Contact Us -->
	<div class="touch-line">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
				   <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
				</div>
				<div class="col-md-4">
				   <a class="btn btn-lg btn-secondary btn-block" href="/contact"> Contact Us </a>
				</div>
			</div>
		</div>
	</div>
@endsection