<?php

namespace App\Http\Controllers;

use App\Helpers\Constants;
use App\Mail\RegisterConfirmation;
use App\Models\Blog;
use App\Models\City;
use App\Models\Country;
use App\Models\Treatment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function register (Request $request)
    {
        $countries = Country::select('id','name')->get();
        return view ('user-auth.signup', compact ('countries'));
    }

    public function getCities (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'country_id' => 'required'
        ]);

        if ($validator->fails()) {
            return sendError($validator->messages()->first(), null);
        }

        $country = Country::find($request->country_id);

        if(!$country){
            return sendError ('Unable to find country.', null);
        }

        $cities = City::where('country_id', $request->country_id)->get();
        if ($cities){
            return sendSuccess ('Cities found successfully...!!!', $cities);
        }else {
            return sendError ('Something went wrong...!!!', null);
        }
    }

    public function registerPost (Request $request)
    {
        $this->validate($request, [
            'username' => 'required|min:3|max:20',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users,email',
            'gender' => 'required|in:Male,Female,Other',
            'country' => 'required|exists:countries,id',
            'city' => 'required|exists:cities,id',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
            'remember' => 'required',
        ]);

        DB::beginTransaction();
        try {
            $user =  new User();

            $check = $user->where('email', $request->email)->orWhere('username', $request->username)->first();


            if ($check){
                return redirect()->back()->with('error', "User is already exist.") ;
            }

            $user->username =  $request->username ?? null;
            $user->first_name =  $request->first_name ?? null;
            $user->last_name =  $request->last_name ?? null;
            $user->email =  $request->email ?? null;
            $user->gender =  $request->gender ?? null;
            $user->country_id =  $request->country ?? null;
            $user->city_id =  $request->city ?? null;
            $user->remember_token =  Str::random(32) ?? null;
            $user->password =  Hash::make($request->password) ?? null;

            if($user->save()){
                $viewData['link'] = url('verify_email') . '/' . $user->remember_token;
                $viewData['full_name'] = $user->first_name."".$user->last_name;
                $viewData['user_email'] = $user->email;
                $viewData['activate_code'] =  $user->remember_token;
                Mail::to($user->email)->send(new RegisterConfirmation($viewData));

                DB::commit();
                return redirect()->route('user.login')->with('success', 'Your account has been successfully created. Please check your email account to verify/confirm the registration.') ;
            } else {
                return redirect()->back()->with('error', "Something went wrong.") ;
            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'something went '.$e->getMessage()) ;
        }
    }

    public function verifyEmail($key) {
        $user_record = User::where('remember_token', $key)->first();
        if ($user_record) {
            $user_record->remember_token = NULL;
            $user_record->email_verified_at = Carbon::now();
            $user_record->save();
            return Redirect()->route('user.login')->with('success' , 'Your account verified successfully please login to access your account.');
        }else{
            return redirect()->route('user.login')->with('error' , 'The link has been expired.') ;
        }
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
            'remember' => 'required',
        ]);

        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $status = User::where($fieldType, $request->input('username'))->first();

        if(!$status) {
            return redirect()->back()->with('error', "User doesn't exist.") ;
        }else{
            if($status->email_verified_at == Null) {
                return redirect()->back()->with('error', "Please verify your email address.") ;
            } elseif ($status->status == '0'){
                return redirect()->back()->with('error', "You are block by the admin.") ;
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
        return view ('user-auth.forget-password');
    }

    public function forgotPasswordPost (Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
        ]);
        try {
            $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

            $status = User::where($fieldType, $request->input('username'))->first();
            if ($status) {

                if($status->email_verified_at == NULL || $status->email_verified_at == '') {
                    return redirect()->back()->with('error' , "Please check your email and verify your account first.") ;
                } else {
                    $activate_code = Str::random(15);
                    $status->remember_token = $activate_code;
                    $status->save();
                    $data[ 'token' ] = $activate_code;
                    $data[ 'name' ]  = $status->first_name." ".$status->first_name;
                    \Mail::to($status->email)->send(new \App\Mail\ResetPassword($data));
                    return redirect()->back()->with('success' , "Password reset link has been sent to your email") ;
                }

            }else{
                return redirect()->back()->with('error' , "User doesn't exist.") ;
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', "something went wrong.") ;
        }
    }

    public function resetPassword ($token)
    {
        $user_record = User::where('remember_token', $token)->first();
        if ($user_record) {
            if(getTimeDifferenceInMinute ($user_record->updated_at, Carbon::now ()) < 5){
                return view('user-auth.reset-password' , compact('token')) ;
            }
            return redirect()->route('user.login')->with('error' , 'Your link has been expired.') ;
        }
        return redirect()->route('user.login')->with('error' , 'Something went wrong.') ;
    }

    public function updatePassword (Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:6',
        ]);

        if(!Hash::check($request->old_password, auth()->user()->password)){
            return redirect()->back()->with("error", "Old Password Doesn't match!");
        }
        $user = User::where('id', auth()->user()->id)->update([
            'password' => Hash::make($request->password)
        ]);

        if($user){
            return redirect()->back()->with("success", "Password changed successfully!");
        }
        return redirect()->back()->with('error', 'Something went wrong...!!!') ;
    }

    public function logout (Request $request)
    {
        Auth::logout();
        return redirect('/');
    }

    public function userProfile(){
        $countries = Country::select('id','name')->get();
        $blogs = Blog::with('category')->where('user_id', Auth::user()->id)->paginate(10);
        return view('profile-setting', compact ('countries', 'blogs'));
    }
}
