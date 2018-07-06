<!doctype html>
<html class="fixed">
	<head>

		<!-- Basic -->
		<meta charset="UTF-8">

		<meta name="keywords" content="HTML5 Admin Template" />
		<meta name="description" content="Porto Admin - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800|Shadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href={{ url('assets/vendor/bootstrap/css/bootstrap.css') }} />
		<link rel="stylesheet" href={{ url('assets/vendor/font-awesome/css/font-awesome.css') }} />
		<link rel="stylesheet" href={{ url('assets/vendor/magnific-popup/magnific-popup.css') }} />
		<link rel="stylesheet" href={{ url('assets/vendor/bootstrap-datepicker/css/datepicker3.css') }} />

		<!-- Theme CSS -->
		<link rel="stylesheet" href={{ url('assets/stylesheets/theme.css') }} />

		<!-- Skin CSS -->
		<link rel="stylesheet" href={{ url('assets/stylesheets/skins/default.css') }} />

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href={{ url('assets/stylesheets/theme-custom.css') }}>

		<!-- Head Libs -->
		<script src={{ url('assets/vendor/modernizr/modernizr.js') }}></script>

	</head>
	<body>
		<!-- start: page -->
		<section class="body-sign">
			<div class="center-sign">
				<a href="/" class="logo pull-left">
					<img src={{ url('assets/images/logo.png') }} height="54" alt="Porto Admin" />
				</a>

				<div class="panel panel-sign">
					<div class="panel-title-sign mt-xl text-right">
						<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> @lang('title.signup_title_txt')</h2>
					</div>
					<div class="panel-body">
						<form action={{ route('auth.register') }} method="post" id="frmForm">
							{{ csrf_field() }}
							<div class="form-group mb-lg">
								<label>@lang('title.name_txt')</label>
								<input name="name" type="text" class="form-control input-lg" />
							</div>

							<div class="form-group mb-lg">
								<label>@lang('title.email_txt')</label>
								<input name="email" type="email" class="form-control input-lg" />
							</div>

							<div class="form-group mb-none">
								<div class="row">
									<div class="col-sm-6 mb-lg">
										<label>@lang('title.password_txt')</label>
										<input name="password" type="password" class="form-control input-lg" />
									</div>
									<div class="col-sm-6 mb-lg">
										<label>@lang('title.password_cfm_txt')</label>
										<input name="password_confirmation" type="password" class="form-control input-lg" />
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-8">
									<div class="checkbox-custom checkbox-default">
										<input id="AgreeTerms" name="agreeterms" type="checkbox"/>
										<label for="AgreeTerms">I agree with <a href="#">terms of use</a></label>
									</div>
								</div>
								<div class="col-sm-4 text-right">
									<button type="submit" class="btn btn-primary hidden-xs">@lang('title.signup_btn_txt')</button>
									<button type="submit" class="btn btn-primary btn-block btn-lg visible-xs mt-lg">Sign Up</button>
								</div>
							</div>

							<span class="mt-lg mb-lg line-thru text-center text-uppercase">
								<span>@lang('title.or_txt')</span>
							</span>

							<div class="mb-xs text-center">
								<a class="btn btn-facebook mb-md ml-xs mr-xs">@lang('title.connect_fb_txt') <i class="fa fa-facebook"></i></a>
								<a class="btn btn-twitter mb-md ml-xs mr-xs">@lang('title.connect_tw_txt') <i class="fa fa-twitter"></i></a>
							</div>

							<p class="text-center">@lang('title.already_acc_txt')</a>

						</form>
					</div>
				</div>

				<p class="text-center text-muted mt-md mb-md">@lang('title.footer_txt')</p>
			</div>
		</section>
		<!-- end: page -->

		<!-- Vendor -->
		<script src={{ url('assets/vendor/jquery/jquery.js') }}></script>
		<script src={{ url('assets/vendor/jquery-browser-mobile/jquery.browser.mobile.js') }}></script>
		<script src={{ url('assets/vendor/bootstrap/js/bootstrap.js') }}></script>
		<script src={{ url('assets/vendor/nanoscroller/nanoscroller.js') }}></script>
		<script src={{ url('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.js') }}></script>
		<script src={{ url('assets/vendor/magnific-popup/magnific-popup.js') }}></script>
		<script src={{ url('assets/vendor/jquery-placeholder/jquery.placeholder.js') }}></script>
		<script src={{ url('assets/vendor/jquery-validation/jquery.validate.js') }}></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src={{ url('assets/javascripts/theme.js') }}></script>
		
		<!-- Theme Custom -->
		<script src={{ url('assets/javascripts/theme.custom.js') }}></script>
		
		<!-- Theme Initialization Files -->
		<script src={{ url('assets/javascripts/theme.init.js') }}></script>
		
		<script src={{ url('js/register.blade.js') }}></script>

	</body>
</html>