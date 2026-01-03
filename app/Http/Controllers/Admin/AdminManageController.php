<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminManageController extends Controller
{

    public function index()
    {

        $users = User::get();

        return view('Admin.role_management.user_create', compact('users'));
    }

    public function create_user(Request $request)
    {

        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',
            'role'  => 'required|in:Admin,Editor,User',
        ]);

        if (User::where('email', $request->email)->exists()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Email already exists',
                'email'   => $request->email,
            ]);
        }

        // ✅ Create user
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make('password@123'), // or random password
        ]);

        return response()->json([
            'status'  => 'success',
            'message' => 'User created successfully',
            'user'    => $user,
        ]);

    }

    public function delete_user(Request $request)
    {

        $user_id = base64_decode($request->id);

        $user = User::find($user_id);

        if (! $user) {
            return response()->json([
                'status'  => 'error',
                'message' => 'User not found',
            ]);
        }

        // Optional: prevent deleting self
        if (auth()->id() == $user->id) {
            return response()->json([
                'status'  => 'error',
                'message' => 'You cannot delete your own account.',
                'email' => $user->email,
            ]);

        }

        $user->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Account Deleted',
            
        ]);

    }

}
