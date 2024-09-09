<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
   
    public function showUserLoginForm()
    {
     return view('auth.login');
    }
 
    public function userLogin(Request $request)
    {
      $credentials = $request->only('email', 'password');
        //  if (Auth::guard('web')->attempt($credentials)) {
        //      return redirect()->intended('dashboard');
        //  }

         if (Auth::guard('web')->attempt($credentials)) {
            return redirect()->intended(route('staff.dashboard'));
         }
 
         return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
 
    public function showAdminLoginForm()
    {
     return view('admin_auth.adminlogin');
    }
 
    public function adminLogin(Request $request)
    {
      $credentials = $request->only('email', 'password');
 
        //  if (Auth::guard('admin')->attempt($credentials)) {
        //      return redirect()->intended('dashboard');
        //  }
         if (Auth::guard('admin')->attempt($credentials)) {
          return redirect()->intended(route('admin.dashboard'));
         }
 
         return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }
 
    public function logoutAdmin()
     {
         // Check if the admin is logged in
    if (Auth::guard('admin')->check()) {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login'); // Redirect to the admin login page after logout
    }

    // Check if the regular user is logged in
    if (Auth::guard('web')->check()) {
        Auth::guard('web')->logout();
        return redirect()->route('home'); // Redirect to the home page after logout
    }

    // Default redirect if no user is logged in
    return redirect()->route('home');
     }

}