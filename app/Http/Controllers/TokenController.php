<?php
namespace App\Http\Controllers;

use App\Models\MasterSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function collect(Request $request)
    {
        $user = Auth::user();

        $currentTokens = (int) $user->my_tokens;

        $masterSetting = MasterSetting::first();

        $today = now()->toDateString();
        
        if ($user->last_token_collected_at && $user->last_token_collected_at->isToday()) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Already collected today',
            ]);
        }

        $user->update([
            'my_tokens'               => $currentTokens + $masterSetting->token_limit,
            'last_token_collected_at' => $today,
        ]);

        return response()->json([
            'status' => 'success',
            'tokens' => $user->my_tokens,
        ]);
    }
}
