<?php
namespace App\Http\Controllers;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\View;
use DB;
use Auth;
use Hash;
use Redirect;
class HomeController extends Controller {
	protected $layout = 'layouts.layout1';
	public function dashboard()
	{//echo "here";exit;
	if (Auth::check()) {
		//$data = array('name'=>'bikram','email'=>'test@gmail.com','password'=>Hash::make('123456'));
		//DB::table('users')->insert($data);
		return view('setup');
	}else{
	return redirect('home/login');
	}
	}
	
	public function get_users(){
            $users = DB::table('users')->get();echo "<pre>";print_r($users);exit;
	}

	public function login(){
	if(Auth::attempt(['email'=>'test@gmail.com','password'=>'123456'])){
	return redirect('home/dashboard');
	}else{
	return redirect('home/login');
	}
	}	

}
