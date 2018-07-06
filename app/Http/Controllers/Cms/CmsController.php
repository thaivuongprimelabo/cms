<?php
namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CmsController extends Controller {

    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        
    }
    
    public function dashboard() {
        return view('cms.dashboard');
    }
}
