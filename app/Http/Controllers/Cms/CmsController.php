<?php
namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use View;

class CmsController extends Controller {
    
    protected $guard = 'web';
    protected $user = [];
    
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
        
//         print_r(Auth::user());exit;
        
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard($this->guard)->user();
            View::share(['user' => $this->user]);
            return $next($request);
        });
        
    }
    
    public function dashboard() {
        return view('cms.dashboard');
    }
    
}
