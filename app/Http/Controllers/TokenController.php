<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokenController extends Controller
{
    public function collect(Request $request)
    {
        $user = Auth::user();

        $currentTokens = (int) $user->my_tokens;


        $today = now()->toDateString();

        if ($user->last_token_collected_at === $today) {
            return response()->json([
                'status'  => 'error',
                'message' => 'Already collected today',
            ]);
        }

        $user->update([
            'my_tokens'               => $currentTokens + 20,
            'last_token_collected_at' => $today,
        ]);

        return response()->json([
            'status' => 'success',
            'tokens' => $user->my_tokens,
        ]);
    }
}
