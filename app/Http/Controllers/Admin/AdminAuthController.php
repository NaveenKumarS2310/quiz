<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AdminAuthController extends Controller
{
    //
    public function login()
    {

        if (Auth::check()) {
            // dd('sad',$routeName);

            
                return redirect()->route('admin.dashboard');
           
        }
        return view('Admin.Auth.login');
    }
    public function loginSubmit(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, true)) {
            return redirect()->route('admin.dashboard');
        }
        return back()->with('error', 'Opps! You have entered invalid credentials');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
       
    }
}
