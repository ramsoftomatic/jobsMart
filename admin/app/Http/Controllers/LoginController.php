<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\Cache;
use App\Http\Controllers\Cookie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth, Validator, Input, Redirect,Session; 
/*use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;*/

class LoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['only' => 'store']);
    }


    public function showlogin(Request $request){

        if(Session::has('username'))
           return Redirect::to('/dashboard');
        else
            return view('login');
    }
    public function login(Request $request){

        $rules = array(
        'username'    => 'required|email', // make sure the email is an actual email
        'password' => 'required|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('/')
            ->withErrors($validator) // send back all errors to the login form
            ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } 
        else {

            // create our user data for the authentication
            $userdata = array(
            'email'     => Input::get('username'),
            'password'  => Input::get('password')
            );
             if (Auth::attempt($userdata)) {
                /*Session::set('user', Input::get('username'));*/
                $user = Auth::user();
                $username = $user->name;
                $email = $user->email;
                $password = $user->password;
                Session::put('username',$username);
                Session::put('email',$email);
                Session::put('password',$password);
                return Redirect::to('/dashboard');


                // validation successful!
                // redirect them to the secure section or whatever
                // return Redirect::to('secure');
                // for now we'll just echo success (even though echoing in a controller is bad)
                /*return Redirect::to('/dashboard');*/

            }
            else {        
                return redirect()->back()->with('status','Invalid Username or Password.');
            }

        }
        /*$this->validate($request, [
            'username' => 'required',
            'password'=>'required'
        ]);


        $data = $request->only('username','password');
        if(\Auth::attempt($data)){
            
        }
        $this->validate($request, [
            'username' => 'required',
            'password'=>'required'
        ]);*/

        return 'success';
    }
    public function logout(Request $request)
    {
        Auth::logout();
        \Cache::flush();
        Session::forget('username');
        Session::forget('email');
        Session::forget('password');
        Session::flush();
        return redirect('/')->withCookie(\Cookie::forget('laravel_token'))->with('action','Successfully Logout');
    }
}

?>
