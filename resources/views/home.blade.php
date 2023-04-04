@extends('layout.main')

@section('content')
<header class="slider-main">
    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
           <!-- Slide One - Set the background image for this slide in the line below -->
           <div class="carousel-item active" style="background-image: url({{ asset('storage/' . $slides[0]->image) }})">
              <div class="carousel-caption d-none d-md-block">
                 <h3>{{ $slides[0]->mainTitle }}</h3>
                 <p>{{ $slides[0]->subTitle }}</p>
              </div>
           </div>
           <!-- Slide Two - Set the background image for this slide in the line below -->
           @foreach ($slides->skip(1) as $slide)    
            <div class="carousel-item" style="background-image: url({{ asset('storage/' . $slide->image) }}">
                <div class="carousel-caption d-none d-md-block">
                    <h3>{{ $slide->mainTitle }}</h3>
                    <p>{{ $slide->subTitle }}</p>
                </div>
            </div>
           @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</header>

<!-- Page Content -->
<div class="container">        
    <!-- About Section -->
    <div class="about-main">
        <div class="row">
           <div class="col-lg-6">
              <h2>Welcome to Zonebiz</h2>
              <p>{!! $abouts[0]->desc !!}</p>
           </div>
           <div class="col-lg-6">
              <img class="img-fluid rounded" src="{{ asset('storage/' . $abouts[0]->image) }}" alt="" />
           </div>
        </div>
        <!-- /.row -->
    </div>
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
    <!-- Portfolio Section -->
    <div class="portfolio-main">
        <h2>Our Portfolio</h2>
        <div class="col-lg-12">
            <div class="project-menu text-center">
                <button class="btn btn-primary active" data-filter="*">All</button>
                @foreach ($services as $service)
                    <button data-filter=".{{ strtolower(str_replace(' ', '-', $service->type)) }}" class="btn btn-primary">{{ $service->type }}</button>
                @endforeach
            </div>
        </div>
        <div id="projects" class="projects-main row">
            @foreach ($portfolios as $portfolio)
                <div class="col-lg-4 col-sm-6 pro-item portfolio-item {{ strtolower(str_replace(' ', '-', $portfolio->service->type)) }}">
                <div class="card h-100">
                    <div class="card-img">
                        <a href="{{ asset('storage/' . $portfolio->image) }}" data-fancybox="images">
                            <img class="card-img-top" src="{{ asset('storage/' . $portfolio->image) }}" alt="" />
                            <div class="overlay"><i class="fas fa-arrows-alt"></i></div>
                        </a>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title">
                            <a disabled>{{ $portfolio->service->type }}</a>
                        </h4>
                    </div>
                </div>
                </div>
            @endforeach
        </div>
        <!-- /.row -->
    </div>
</div>

<div class="blog-slide">
    <div class="container">
        <h2>Our Blog</h2>
        <div class="row">
            <div class="col-lg-12">
                <div id="blog-slider" class="owl-carousel">
                    @foreach ($blogs as $blog)
                        <div class="post-slide">
                            <div class="post-header">
                                <h4 class="title">
                                    <a disabled>Latest blog Post</a>
                                </h4>
                                <ul class="post-bar">
                                    <li><i class="fa fa-calendar"></i>{{ $blog->created_at->format('d, M Y') }}</li>
                                </ul>
                            </div>
                            <div class="pic">
                                    <img src="{{ asset('storage/' . $blog->image) }}" alt="">
                                <ul class="post-category">
                                    <li><a href="/blog?category={{ $blog->category->slug }}">{{ $blog->category->name }}</a></li>
                                </ul>
                            </div>
                            <p class="post-description">
                                <a  style="color: #000" href="/blog/{{ $blog->slug }}">
                                {{ $blog->excerpt }}
                                </a>
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
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