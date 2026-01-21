<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MasterSetting;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
                'email'   => $user->email,
            ]);

        }

        $user->delete();

        return response()->json([
            'status'  => 'success',
            'message' => 'Account Deleted',

        ]);

    }

    public function token_index()
    {

        $masterSetting = MasterSetting::first();
        $users         = User::get();

        if (! $masterSetting) {
            DB::table('token_collections')->insert([
                'token_limit' => 20,
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);

            $dailyLimit = 20;
        } else {
            $dailyLimit = $masterSetting->token_limit;
        }

        $data = User::select(
        'name',
        'email',
        'my_tokens',
        'last_token_collected_at'
        )
        ->orderByRaw('last_token_collected_at IS NULL')
        ->orderBy('last_token_collected_at', 'desc')
        ->get();


        $todayTokens = $data
       ->filter(function ($user) {
        return !is_null($user->last_token_collected_at)
            && $user->last_token_collected_at->isToday();
        })
        ->sum('my_tokens');

       // dd($todayTokens);

        $activity = [
            'users'       => $users->count(),
            'distributed' => $users->sum('my_tokens'),
            'today'       => $todayTokens,
        ];

        //dd($activity['today']);

        return view('Admin.token_management.index', compact('data', 'dailyLimit', 'activity'));

    }

    public function update_token_limit(Request $request)
    {

        $request->validate([
            'limit' => 'required|integer|min:1',
        ]);

        $setting = MasterSetting::first();
        $setting->update([
            'token_limit' => $request->limit,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Daily token limit updated successfully',
        ]);

    }

}
