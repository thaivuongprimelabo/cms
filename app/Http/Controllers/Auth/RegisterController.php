<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Helpers\MailHelper;
use Carbon\Carbon;
use App\Constants;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'cms_name' => str_replace(' ', '', strtolower($data['cms_name'])),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'register_token' => $data['token'],
            'register_token_expired' => $data['expired'],
            'system_id' => $data['system_id'],
            'role_id' => $data['role_id'],
        ]);
    }
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request) {
        
        $this->validator($request->all())->validate();
        
        $data = $request->all();
        $data['token'] = str_random(16);
        $data['expired'] = Carbon::now()->addMinutes(Constants::ADD_MINUTE_REGISTER_EXPIRED);
        $data['system_id'] = rand(1,9999);
        
        event(new Registered($user = $this->create($data)));
        
        $config = [
            'from'      => MailHelper::FROM_MAIL,
            'from_name' => MailHelper::FROM_MAIL_NAME,
            'subject'   => __('mail.register_subject_txt'),
            'to'        => $request->email,
            'template'  => 'email.confirm_register',
            'data'      => $user
        ];
        
        if(MailHelper::sendMail($config)) {
            return $this->registered($request, $user) ?: redirect(route('auth.signup.success'))->with('email_confirm', $request->email);
        } else {
            return redirect(route('auth.signup'))->with('sendmail_error', __('messages.err_sendmail'));
        }
    }
    
    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function registerSuccess(Request $request) {
        if($request->session()->has('email_confirm')) {
            $email_confirm = $request->session()->get('email_confirm');
            return view('auth.register_success',compact('email_confirm'));
        } else {
            return redirect(route('auth.signup'));
        }
    }
    
    /**
     * confirmRegister.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function confirmRegister(Request $request) {
        $token = $request->token;
        $user = User::find($request->id);
        $expired = strtotime($user->register_token_expired);
        $now = strtotime(Carbon::now());
        if($user->avail_flg == Constants::DEACTIVE_FLG && $user->register_token == $token && $expired > $now) {
            $user->avail_flg = Constants::ACTIVE_FLG;
            $user->save();
            $this->guard()->loginUsingId($user->id);
            return redirect(route('auth.signup.redirect',['cms_name' => $user->cms_name]));
//             return redirect($user->cms_name . '.cms.dashboard');
        } else {
            return redirect(route('auth.signup.confirm.fail'));
        }
    }
    
    public function confirmFail(Request $request) {
        return view('auth.confirm_fail');
    }
    
    public function confirmSuccess(Request $request) {
        return view('auth.confirm_success');
    }
    
    public function redirectConfirm(Request $request) {
        return redirect(route($request->cms_name . '.cms.dashboard'));
    }
    
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */
    public function checkMail(Request $request) {
        if(!blank($request->email)) {
            $user = User::where('email', $request->email)->first();
            if(!$user) {
                echo 'true';
                exit;
            }
        }
        echo 'false';
        exit;
    }
}
