<?php
namespace App\Http\Controllers;
use Validator;	
use Illuminate\Http\Request;
use DB;
use Auth;
use Hash;
use Redirect;
use Session;
use Mail;
class CompanyController extends Controller {

	public function index(){
		if (Auth::check()) {
			return view('company/dashboard');
		}else{
			return redirect('company/login');
		}
	}

	public function login(){
		if (Auth::check()) {
		return redirect('company');
		}else{
		return view('company/login');
		}
	}

	public function doLogin(Request $request){
		 $validator = Validator::make($request->all(), [
			'email' => 'required',
			'password' => 'required',
		    ]);
		if ($validator->fails()) {
		    return redirect('company/login')
		                ->withErrors($validator)
		                ->withInput();
		}
		if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
			return redirect('company');
		}else{
			$validator->getMessageBag()->add('message', 'Email or Password not correct');   
			return redirect('company/login')->withErrors($validator)->withInput();
		}
	}

	public function forgotPassword(Request $request){
		if (Auth::check()) {
		return redirect('company');
		}else{
			if($request->isMethod('post')){
			$email = $request->input('email');
			 $validator = Validator::make($request->all(), [
				'email' => 'required|email',
			    ]);
			if ($validator->fails()) {
			    return redirect('company/forgot-password')
					->withErrors($validator)
					->withInput();
			}
			$check_email = DB::table('users')->where('email',$email)->first();
			if($check_email){
				$password = str_random(8);
				$update = array('password'=>Hash::make($password));
				DB::table('users')->where('email',$email)->update($update);
				$data = array('username'=>'test', 'password'=>'123456');
				//Mail::send('emails.forgot_password', $data, function($message) use ($email){    
				    //$message->to($email)->subject('Forgot Password');    
				//});
			return view('company/forgot_password',['success'=>'Password('.$password.') sent at your email address']);
			}else{
				$validator->getMessageBag()->add('message', 'Email does not exist');   
				return redirect('company/forgot-password')->withErrors($validator)->withInput();
			}
			}else{
			return view('company/forgot_password');
			}
		
		}
	}

	public function logout(){
		Session::flush();
		return redirect('company/login');
	}

}
