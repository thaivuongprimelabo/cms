<h3>Xin chào {{ $data->name }}!</h3>

<p>
	Để hoàn tất quá trình đăng ký tài khoản, vui lòng truy cập đường dẫn sau:
</p>
<p>
	<a href="{{ route('auth.signup.confirm',['id' => $data->id]) }}?token={{ $data->register_token }}" target="_blank" >Link</a>
</p>
