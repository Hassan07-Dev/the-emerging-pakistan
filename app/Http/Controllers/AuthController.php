<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Models\Country;
use App\Models\Treatment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $countries = Country::select('id','name')->get();
        return view ('user-auth.signup', compact ('countries'));
    }

    public function registerPost (Request $request)
    {

    }

    public function index (Request $request)
    {
        return view ('user-auth.login');
    }

    public function loginPost (Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6',
        ], [

        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $status = User::where($fieldType, $request->input('username'))->first();

        if(!$status) {
            return redirect()->back()->with('error', "User doesn't exist.") ;
        }else{
            if($status->email_verified_at == Null) {
                return redirect()->back()->with('error', "Please verify your email address.") ;
            }else{

                if (Auth::attempt([$fieldType => $request->input('username'), 'password' => $request->input('password') ]) ) {
                    return redirect()->route('home.index');
                }
                else{
                    return redirect()->back()->with('error', "Please check your username/email or password.") ;
                }
            }
        }
    }

    public function forgotPassword (Request $request)
    {

    }

    public function forgotPasswordPost (Request $request)
    {

    }

    public function resetPassword (Request $request)
    {

    }

    public function updatePassword (Request $request)
    {

    }

    public function logout (Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
