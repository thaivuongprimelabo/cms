@extends('layouts.app')
@section('content')
<section class="body-sign">
	<div class="center-sign">
		<a href="/" class="logo pull-left">
			<img src={{ url('assets/images/logo.png') }} height="54" alt="Porto Admin" />
		</a>

		<div class="panel panel-sign">
			<div class="panel-title-sign mt-xl text-right">
				<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> @if(Request::segment(1) != 'auth') @lang('title.signup_title_txt') @else @lang('title.signup_cms_title_txt') @endif</h2>
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
					@if(Request::segment(1) == 'auth')
					<div class="form-group mb-lg">
						<label>@lang('title.cms_name_txt')</label>
						<input name="cms_name" type="text" class="form-control input-lg" />
					</div>
					@endif
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
						<div class="col-sm-12 text-right">
							<button type="submit" class="btn btn-primary hidden-xs">@lang('title.signup_btn_txt')</button>
						</div>
					</div>

					<span class="mt-lg mb-lg line-thru text-center text-uppercase">
						<span>@lang('title.or_txt')</span>
					</span>

					<div class="mb-xs text-center">
						<a class="btn btn-facebook mb-md ml-xs mr-xs">@lang('title.connect_fb_txt') <i class="fa fa-facebook"></i></a>
						<a class="btn btn-twitter mb-md ml-xs mr-xs">@lang('title.connect_tw_txt') <i class="fa fa-twitter"></i></a>
					</div>
					@if(Request::segment(1) != 'auth')
					<p class="text-center">@lang('title.already_acc_txt')</p>
					@endif
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
    			name: {
    				required:true,
    				maxlength: 255
    			},
    			email: {
    				required:true,
    				email: true,
    				remote: {
    					url : '{{ route('auth.check.email') }}',
    					type: 'POST',
    					headers: {
    			          	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    			        }
    				}
    			},
    			password: {
    				required:true,
    				rangelength:[6,40]
    			},
    			password_confirmation: {
    				required:true,
    				rangelength:[6,40]
    			},
    		},
    		messages: {
    			name: {
    				required:'Please input name',
    				maxlength: 'Maximum is 255 char'
    			},
    			email: {
    				required:'Please input email',
    				email: 'Email is invalid',
    				remote: 'Email already in use'
    			},
    			password: {
    				required:'Please input password',
    				rangelength:'Length must be between 6 and 40 char',
    			},
    			password_confirmation: {
    				required:'Please input pw confirmation',
    				rangelength:'Length must be between 6 and 40 char',
    			},
        	}
    	});
    });
</script>
@endsection