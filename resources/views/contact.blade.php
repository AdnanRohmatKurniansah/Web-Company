@extends('layout.main')

@section('content')
    <!-- full Title -->
	<div class="full-title">
		<div class="container">
			<!-- Page Heading/Breadcrumbs -->
			<h1 class="mt-4 mb-3"> Contact </h1>
			<div class="breadcrumb-main">
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<a href="/">Home</a>
					</li>
					<li class="breadcrumb-item active">Contact</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="contact-main">
		<div class="container">
			<!-- Content Row -->
		  <div class="row">
			<!-- Map Column -->
				<div class="col-lg-8 mb-4 contact-left">
					<h3>Send us a Message</h3>
					<form action="" method="post" name="sentMessage" id="contactForm" novalidate>
						@csrf
						<div class="control-group form-group">
							<div class="controls">
								<input type="text" placeholder="Full Name" name="name" class="form-control @error('name') is-invalid @enderror" id="name" required data-validation-required-message="Please enter your name." value="{{ old('name') }}">
								<p class="help-block"></p>
								@error('name')
								<div class="invalid-feedback">
								  {{ $message }}
								</div>
							@enderror
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<input type="email" placeholder="Email Address" name="email" class="form-control @error('email') is-invalid @enderror" id="email" required value="{{ old('email') }}" data-validation-required-message="Please enter your email address.">
								@error('email')
									<div class="invalid-feedback">
										{{ $message }}
									</div>
								@enderror
							</div>
						</div>
						<div class="control-group form-group">
							<div class="controls">
								<textarea rows="5" cols="100" placeholder="Message" name="message" class="form-control" id="message" required value="{{ old('message') }}"data-validation-required-message="Please enter your message" maxlength="999" style="resize:none"></textarea>
								@error('message')
									<p class="text-danger">{{ $message }}</p>
								@enderror
							</div>
						</div>
						<div id="success"></div>
						<!-- For success/fail messages -->
						<button type="submit" class="btn btn-primary" id="sendMessageButton">Send Message</button>
					</form>
				</div>
				<!-- Contact Details Column -->
				<div class="col-lg-4 mb-4 contact-right">
					<h3>Contact Details</h3>
					<p>
						3481 Melrose Place
						<br>Beverly Hills, CA 90210
						<br>
					</p>
					<p>
						<abbr title="Phone">P</abbr>: (123) 456-7890
					</p>
					<p>
						<abbr title="Email">E</abbr>:
						<a href="mailto:name@example.com"> name@example.com </a>
					</p>
					<p>
						<abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
					</p>
				</div>
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	
	<div class="map-main">
		<!-- Embedded Google Map -->
		<iframe width="100%" height="300px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;ll=37.0625,-95.677068&amp;spn=56.506174,79.013672&amp;t=m&amp;z=4&amp;output=embed"></iframe>
	</div>
@endsection