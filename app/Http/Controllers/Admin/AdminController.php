<?php

namespace App\Http\Controllers\Admin;

use App\HelpersFunction\Constants;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }

        return view ('admin.auth.login');
    }

    /**
     * @param Request $request
     * @return void
     */
    public function loginCheck(Request $request){
        if(Auth::guard('admin')->check()){
            return redirect()->route('admin.dashboard');
        }

        $this->validate($request, [
            'email'		=> 'required|email',
            'password'	=> 'required',
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $Admin 	= Auth::guard('admin')->user();
            if ($Admin->status == Constants::STATUS) {
                return redirect()->route('admin.dashboard');
            }else {
                Auth::guard('admin')->logout();
                Session::flash('error', 'Your account is inactive.');
                return Redirect::to(route('admin'));
            }
        } else {
            Session::flash('error', 'Invalid email or password.');
            return Redirect::to(route('admin'));
        }
    }

    /**
     * @param Request $request
     * @param $message
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request, $message = false){
        Auth::guard('admin')->logout();
        if ($message == true){
            Session::flash('success', 'Password changed, Please login with new password.');
        }
        return Redirect::to(route('admin.login'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminRequest  $request
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminRequest $request, Admin $admin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
