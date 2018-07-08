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
				@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif
				<form method="POST" action="{{ route('auth.password.send.link') }}" id="frmForm">
					{{ csrf_field() }}
					<div class="form-group mb-lg">
						<label>@lang('title.email_txt')</label>
						<div class="input-group input-group-icon">
							<input name="email" type="text" id="email" class="form-control input-lg" />
							@if ($errors->has('email'))
								<label for="email" class="error">{{ $errors->first('email') }}</label>
                            @endif
							<span class="input-group-addon">
								<span class="icon icon-lg">
									<i class="fa fa-user"></i>
								</span>
							</span>
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
    			},
    		},
    		messages: {
    			email: {
    				required:'Please input email',
    				email: 'Email is invalid',
    			},
    		}
    	});
    });
</script>
@endsection
