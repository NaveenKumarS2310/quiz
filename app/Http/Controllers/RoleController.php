<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class RoleController extends Controller
{
    public function index(){

        $users = User::where('role', '!=', 'Admin')->get();

       return view('role_management.index', compact('users'));
    }

    public function role_changer(Request $request){

        $U_id = base64_decode($request->id);
        $role = base64_decode($request->type);
    
        User::where('id', $U_id)->update(['role' => $role == "User" ? 'Editor' : 'User']);

        return response()->json(['status' => 'success']);

    }
}
