

@extends('layouts.app')

@section('content')
<section class="body-sign">
	<div class="center-sign">
		<a href="/" class="logo pull-left">
			<img src={{ url('assets/images/logo.png') }} height="54" alt="Porto Admin" />
		</a>

		<div class="panel panel-sign">
			<div class="panel-title-sign mt-xl text-right">
				<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> @lang('title.reset_password_title_txt')</h2>
			</div>
			<div class="panel-body">
				<form method="POST" action="{{ route('auth.password.reset') }}" id="frmForm">
					{{ csrf_field() }}
					
					<input type="hidden" name="token" value="{{ $token }}">
					
					<div class="form-group mb-lg">
						<label>@lang('title.email_txt')</label>
						<div class="input-group input-group-icon">
							<input name="email" type="text" id="email" class="form-control input-lg" />
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-user"></i>
								</span>
							</span>
							@if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
						</div>
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
						<div class="col-sm-6">
							<a href={{ route('auth.login') }}>Đăng nhập</a>|<a href={{ route('auth.signup') }}>Đăng ký</a>
						</div>
						<div class="col-sm-6 text-right">
							<button type="submit" class="btn btn-primary hidden-xs">@lang('title.reset_password_btn_txt')</button>
						</div>
					</div>

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
