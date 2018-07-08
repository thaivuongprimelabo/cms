@extends('layouts.app')
@section('content')
<section class="body-sign">
	<div class="center-sign">
		<a href="/" class="logo pull-left">
			<img src={{ url('assets/images/logo.png') }} height="54" alt="Porto Admin" />
		</a>

		<div class="panel panel-sign">
			<div class="panel-title-sign mt-xl text-right">
				<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> @lang('title.signin_title_txt')</h2>
			</div>
			<div class="panel-body">
				@if (session('error_login'))
                    <div class="alert alert-danger">
                        {{ session('error_login') }}
                    </div>
                @endif
				<form action={{ route('auth.authenticate') }} method="post" id="frmForm">
					{{ csrf_field() }}
					<div class="form-group mb-lg">
						<label>@lang('title.email_txt')</label>
						<div class="input-group input-group-icon">
							<input name="email" type="text" id="email" class="form-control input-lg" />
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-user"></i>
								</span>
							</span>
						</div>
					</div>

					<div class="form-group mb-lg">
						<div class="clearfix">
							<label class="pull-left">@lang('title.password_txt')</label>
							<a href={{ route('auth.passwords.request.form') }} class="pull-right">@lang('title.lost_password_txt')</a>
						</div>
						<div class="input-group input-group-icon">
							<input name="password" type="password" id="password" class="form-control input-lg" />
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-lock"></i>
								</span>
							</span>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-8">
							<div class="checkbox-custom checkbox-default">
								<input id="RememberMe" name="rememberme" type="checkbox" value="1" />
								<label for="RememberMe">@lang('title.remember_me_txt')</label>
							</div>
						</div>
						<div class="col-sm-4 text-right">
							<button type="submit" class="btn btn-primary hidden-xs">@lang('title.signin_btn_txt')</button>
						</div>
					</div>

					<span class="mt-lg mb-lg line-thru text-center text-uppercase">
						<span>@lang('title.or_txt')</span>
					</span>

					<div class="mb-xs text-center">
						<a class="btn btn-facebook mb-md ml-xs mr-xs">@lang('title.connect_fb_txt') <i class="fa fa-facebook"></i></a>
						<a class="btn btn-twitter mb-md ml-xs mr-xs">@lang('title.connect_tw_txt') <i class="fa fa-twitter"></i></a>
					</div>

					<p class="text-center">@lang('title.signup_acc_txt')</p>

				</form>
			</div>
		</div>

		<p class="text-center text-muted mt-md mb-md">@lang('title.footer_txt')</p>
	</div>
</section>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function() {
	$('#frmForm').validate({
		rules: {
			email: {
				required:true,
				maxlength: 255,
				email:true
			},
			password: {
				required:true,
				rangelength: [6,40]
			}
		},
		messages: {
			email: {
				required: "Please input Email",
				maxlength: "Maximum is 255 character",
				email:"Email is invalid"
            },
            password: {
            	required: "Please input Password",
            	rangelength: "Input value must be between 6 and 40 char",
            }
    	}
	});
});
</script>
@endsection