@extends('layout.main')

@section('content')
    <!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> Portfolio</h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/">Home</a>
					</li>
					<li class="breadcrumb-item active">Portfolio</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="portfolio-col">
		<div class="container">
			<div class="row">
				@foreach ($portfolios as $portfolio)
					<div class="col-lg-4 col-sm-6 portfolio-item">
						<div class="card h-100">
							<a class="hover-box" disabled>
								<div class="dot-full">
								</div>
								<img class="card-img-top" src="{{ asset('storage/' . $portfolio->image) }}" alt="" />
							</a>
							<div class="card-body">
								<h4><a href="#">{{ $portfolio->projectName }}</a></h4>
								<p>{{ $portfolio->service->type }}</p>
							</div>
						</div>
					</div>
				@endforeach
			</div>

			<div class="d-flex justify-content-center">
				{{ $portfolios->links() }}
				</div>
			</div>
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