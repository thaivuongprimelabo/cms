@extends('layouts.app')
@section('content')
<section class="body-sign">
	<div class="center-sign">
		<a href="/" class="logo pull-left">
			<img src={{ url('assets/images/logo.png') }} height="54" alt="Porto Admin" />
		</a>

		<div class="panel panel-sign">
			<div class="panel-title-sign mt-xl text-right">
				<h2 class="title text-uppercase text-bold m-none"><i class="fa fa-user mr-xs"></i> @lang('title.confirm_success_title_txt')</h2>
			</div>
			<div class="panel-body">
				<p class="text-center">@lang('title.confirm_success_txt')</p>
			</div>
		</div>

		<p class="text-center text-muted mt-md mb-md">@lang('title.footer_txt')</p>
	</div>
</section>
@endsection