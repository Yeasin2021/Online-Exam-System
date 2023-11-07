<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loadRegister()
    {
        return view('Admin-Panel.auth.register');
    }

    public function studentRegister(Request $request)
    {
        $request->validate([
            'name' => 'string|required|min:2',
            'email' => 'string|email|required|max:100|unique:users',
            'password' => 'string|required|min:6',
        ]);

        User::create(
            [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

        return back()->with("success","Your Registration Has Been Successful.");
    }


    public function loginPage()
    {
        if(Auth::user() && Auth::user()->is_admin == 1)
            {
                return redirect('/admin/dashboard');
            }
            else if(Auth::user() && Auth::user()->is_admin == 0)
            {
                return redirect('/student/dashboard');
            }
        return view('Admin-Panel.auth.login');
    }

    public function login(Request $request)
    {
        $request->validate(
            [
                'email'    =>'string|required|email',
                'password' =>'string|required|min:6',
            ]
        );

        $userCredintial = $request->only('email','password');
        if(Auth::attempt($userCredintial))
        {
            if(Auth::user()->is_admin == 1)
            {
                return redirect('/admin/dashboard');
            }else{
                return redirect('/student/dashboard');
            }
        }else{
            return back()->with('error','User email and Password is incorrect.');
        }
    }


    public function logout(Request $request)
    {
        $request->Session->flush();
        Auth::logout();
        redirect('/');
    }


    public function studentDashboard()
    {
        return view('Admin-Panel.dashboard.studentDashboard');
    }


    public function adminDashboard()
    {
        return view('Admin-Panel.dashboard.adminDashboard');
    }






}
