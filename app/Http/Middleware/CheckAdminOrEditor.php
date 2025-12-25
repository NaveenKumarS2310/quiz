<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
class CheckAdminOrEditor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $tag = ['Admin','Editor'];
        if (!in_array($user->role, $tag)) {
            if ($request->ajax()) {
                return response()->json([
                    'Access forbidden.'
                ], 401);
            }
            return redirect()->route('login')->with('error', 'Access forbidden.');
        }
        
        return $next($request);
    }
}
