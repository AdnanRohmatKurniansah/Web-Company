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
						<img class="card-img-top" src="/assets/images/blog-img-01.jpg" alt="Card image Blog" />
						<div class="card-body">
							<div class="by-post">
								Posted on January 1, 2018 by <a href="#">Zonebiz</a>
							</div>
							<h2 class="card-title">How to run successful business meeting</h2>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
							<a href="#" class="btn btn-primary">Continue &rarr;</a>
						</div>
					</div>
					<!-- Blog Post -->
					<div class="card mb-4">
						<img class="card-img-top" src="/assets/images/blog-img-02.jpg" alt="Card image Blog">
						<div class="card-body">
							<div class="by-post">
								Posted on January 1, 2018 by <a href="#">Zonebiz</a>
							</div>
							<h2 class="card-title">How to run successful business meeting</h2>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
							<a href="#" class="btn btn-primary">Continue &rarr;</a>
						</div>
					</div>
					<!-- Blog Post -->
					<div class="card mb-4">
						<img class="card-img-top" src="/assets/images/blog-img-03.jpg" alt="Card image Blog">
						<div class="card-body">
							<div class="by-post">
								Posted on January 1, 2018 by <a href="#">Zonebiz</a>
							</div>
							<h2 class="card-title">How to run successful business meeting</h2>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
							<a href="#" class="btn btn-primary">Continue &rarr;</a>
						</div>
					</div>
					<div class="pagination_bar_arrow">
					  <!-- Pagination -->
						<ul class="pagination justify-content-center mb-4">
							<li class="page-item">
								<a class="page-link" href="#">&larr; Older</a>
							</li>
							<li class="page-item disabled">
								<a class="page-link" href="#">Newer &rarr;</a>
							</li>
						</ul>
					</div>
				</div>
				<!-- Sidebar Widgets Column -->
				<div class="col-md-4 blog-right-side">
					<!-- Search Widget -->
					<div class="card mb-4">
						<h5 class="card-header">Search</h5>
						<div class="card-body">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search for...">
								<span class="input-group-btn">
									<button class="btn btn-secondary" type="button">Go!</button>
								</span>
							</div>
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
										<li>
										  <a href="#">Web Design</a>
										</li>
										<li>
										  <a href="#">HTML</a>
										</li>
										<li>
										  <a href="#">Freebies</a>
										</li>
									</ul>
								</div>
								<div class="col-lg-6">
									<ul class="list-unstyled mb-0">
										<li>
										  <a href="#">JavaScript</a>
										</li>
										<li>
										  <a href="#">CSS</a>
										</li>
										<li>
										  <a href="#">Tutorials</a>
										</li>
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
				   <a class="btn btn-lg btn-secondary btn-block" href="#"> Contact Us </a>
				</div>
			</div>
		</div>
	</div>
@endsection