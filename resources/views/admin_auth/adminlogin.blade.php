@php
    $SiteSetting = get_latest_site_settings();
@endphp
<!doctype html>
<html lang="en">

<head>
	<title>{{ $SiteSetting->site_title }} Login</title>
	<link rel="icon"  href="{{asset('backend/images/site_settings/'.$SiteSetting->favicon)}}" >
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="{{asset('frontend')}}/login/css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login #01</h2>
				</div>
			</div> -->
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon">
                        <img src="{{asset('backend/images/site_settings/'.$SiteSetting->header_logo)}}" width="100%" alt="logo" />
						</div>
						<!-- <h3 class="text-center mb-4">Sign In</h3> -->
						<form method="POST" action="{{route('admin.loginStore')}}" class="login-form">
							@csrf 
							<div class="form-group">
								<input type="text" class="form-control rounded-left" name="email" placeholder="Email" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" name="password" placeholder="Password"
									required>
							</div>
							<div class="form-group">
								<button type="submit"
									class="form-control btn btn-primary rounded submit px-3">Login</button>
							</div>
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
										<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
								<!-- <div class="w-50 text-md-right">
									<a href="#">Forgot Password</a>
								</div> -->
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('frontend')}}/login/js/jquery.min.js"></script>
	<script src="{{asset('frontend')}}/login/js/popper.js"></script>
	<script src="{{asset('frontend')}}/login/js/bootstrap.min.js"></script>
	<script src="{{asset('frontend')}}/login/js/main.js"></script>

</body>
</html>