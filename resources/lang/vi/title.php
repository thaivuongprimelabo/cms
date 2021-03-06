<?php
return [
    'name_txt'          => 'Họ tên',
    'email_txt'         => 'E-mail',
    'password_txt'      => 'Mật khẩu',
    'cms_name_txt'      => 'Tên gọi CMS',
    'password_cfm_txt'  => 'Xác nhận mật khẩu',
    'signin_title_txt'  => 'Đăng nhập',
    'signin_btn_txt'    => 'Đăng nhập',
    'signup_btn_txt'    => 'Đăng ký',
    'signup_title_txt'  => 'Đăng ký',
    'signup_cms_title_txt'  => 'Đăng ký CMS',
    'reset_password_title_txt' => 'Quên mật khẩu',
    'reset_password_btn_txt' => 'Gửi lại mật khẩu',
    'connect_fb_txt'    => 'Đăng ký bằng',
    'connect_tw_txt'    => 'Đăng ký bằng',
    'already_acc_txt'   => 'Bạn đã có tài khoản? <a href="'. route(Request::segment(1) . '.login') .'">Đăng nhập ngay!</a>',
    'signup_acc_txt'    => 'Bạn chưa có tài khoản? <a href="'. route(Request::segment(1) . '.signup') .'">Đăng ký ngay!</a>',
    'or_txt'            => 'hoặc',
    'lost_password_txt' => 'Quên mật khẩu?',
    'remember_me_txt'   => 'Duy trì đăng nhập',
    'footer_txt'        => '&copy; Copyright ' . date('Y', time()) . '. All Rights Reserved.',
    'signup_success_txt'=> 'E-mail xác nhận đã được gửi tới :email_confirm của bạn.Vui lòng kiểm tra và hoàn tất đăng ký <a href="'.route('auth.login').'">Đăng nhập</a>|<a href="'.route('auth.signup').'">Đăng ký</a>',
    'signup_success_title_txt' => 'Xác nhận đăng ký',
    'confirm_fail_title_txt' => 'Lỗi xác nhận',
    'confirm_fail_txt'  => 'Đường dẫn xác nhận đã hết hạn.Vui lòng xác nhận đăng ký lại.',
    'confirm_success_title_txt' => 'Xác nhận thành công',
    'confirm_success_txt'  => 'Hoàn tất đăng ký.Đang chuyển tới trang chủ...',
    'term_txt'          => 'Tôi đồng ý với các <a href="#">quy định</a>'
];