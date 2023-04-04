@extends('layout.main')

@section('content')
    <!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3">Services</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/">Home</a>
					</li>
					<li class="breadcrumb-item active">Services</li>
				</ol>
			</div>
		</div>	
	</div>
	
    <!-- Page Content -->
    <div class="container">
		<!-- Image Header -->
		<img class="img-fluid rounded mb-4" src="/assets/images/services-big.jpg" alt="" />
	</div>
	<div class="services-bar">
		<div class="container">
			<h1 class="py-4">Our Best Services </h1>
			<!-- Services Section -->
			<div class="row">
				@foreach ($services as $service)
					<div class="col-lg-4 mb-4">
						<div class="card h-100">
							<div class="card-img">
								<img class="img-fluid" src="{{ asset('storage/' . $service->image) }}" alt="" />
							</div>
							<div class="card-body">
								<h4 class="card-header">{{ $service->type }}</h4>
								<p class="card-text">{{ $service->desc }}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>
			<!-- /.row -->
		</div>
	</div>
	
	<div class="container">
		<!-- Our Customers -->
		<div class="customers-box"> 
			<h2>Our Customers</h2>
			<div class="row">
				<div class="col-lg-12">
					<div id="customers-slider" class="owl-carousel">
						<div class="mb-4">
							<img class="img-fluid" src="/assets/images/logo_01.png" alt="" />
						</div>
						<div class="mb-4">
							<img class="img-fluid" src="/assets/images/logo_02.png" alt="" />
						</div>
						<div class="mb-4">
							<img class="img-fluid" src="/assets/images/logo_03.png" alt="" />
						</div>
						<div class="mb-4">
							<img class="img-fluid" src="/assets/images/logo_04.png" alt="" />
						</div>
						<div class="mb-4">
							<img class="img-fluid" src="/assets/images/logo_05.png" alt="" />
						</div>
						<div class="mb-4">
							<img class="img-fluid" src="/assets/images/logo_06.png" alt="" />
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
		</div>
    </div>
    <!-- /.container -->
	
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