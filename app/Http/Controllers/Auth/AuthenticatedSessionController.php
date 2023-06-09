<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;





class AuthenticatedSessionController extends Controller
{
    use AuthenticatesUsers;
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('web');
        /**
         * Display the login view.
         */
    }
    public function create(): View
    {
        return view('auth.login')->with('errors', session('errors') ?? collect());
    }

    /**
     * Handle an incoming authentication request.
     */

     /**
    * @OA\Post(
    *      path="/api/login",
    *      operationId="TitleesI",
    *      tags={"Authertications"},
    *      summary=" login authentication request",
    *      description="Description",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Response Message",
    *          @OA\JsonContent()
    *       ),
    *     )
    */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    
     /**
    * @OA\Post(
    *      path="/api/logout",
    *      operationId="TitleesU",
    *      tags={"Authertications"},
    *      summary=" logout Destroy an authenticated session",
    *      description="Description",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent()
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Response Message",
    *          @OA\JsonContent()
    *       ),
    *     )
    */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
