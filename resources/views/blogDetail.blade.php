@extends('layout.main')

@section('content')
    <!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> Blog </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/">Home</a>
					</li>
					<li class="breadcrumb-item active">Blog</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="blog-main">
		<div class="container">
			<div class="row">
				<!-- Blog Entries Column -->
				<div class="col-md-8 blog-entries">
					<!-- Blog Post -->
						<div class="card mb-4">
							<img class="card-img-top" src="{{ asset('storage/' . $blog->image) }}" alt="Card image Blog" />
							<div class="card-body">
								<div class="by-post">
									Posted on {{ $blog->created_at->format('d, M Y') }} . <a href="/blog?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a>
								</div>
								<h2 class="card-title">{{ $blog->title }}</h2>
								<p class="card-text">{!! $blog->body !!}</p>
							</div>
						</div>
				</div>
				<!-- Sidebar Widgets Column -->
				<div class="col-md-4 blog-right-side">
					<!-- Search Widget -->
					<div class="card mb-4">
						<h5 class="card-header">Search</h5>
						<div class="card-body">
							<form action="/blog">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for..." name="search" value="{{ request('search') }}">
								<span class="input-group-btn">
									<button class="btn btn-secondary" type="submit">Search</button>
								</span>
							</div>
						</form>
						</div>
					</div>
					<!-- Side Widget -->
					<div class="card my-4">
						<h5 class="card-header">Side Widget</h5>
						<div class="card-body">
							You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
						</div>
					</div>
					<!-- Categories Widget -->
					<div class="card my-4">
						<h5 class="card-header">Categories</h5>
						<div class="card-body">
							<div class="row">
								<div class="col-lg-6">
									<ul class="list-unstyled mb-0">
										@foreach ($categories as $category)
											<li><a href="/blog?category={{ $category->slug }}">{{ $category->name }}</a></li>
										@endforeach
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled mb-0">
										@foreach ($categories->skip(6) as $category)
											<li><a href="/blog?category={{ $category->slug }}">{{ $category->name }}</a></li>
										@endforeach
									</ul>
								</div>
							</div>
						</div>
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