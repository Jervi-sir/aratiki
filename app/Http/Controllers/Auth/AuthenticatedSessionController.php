<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

require dirname(__DIR__) . '\zHelpers\notification.php';

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        try {
            $previous_url = $request->session()->get('_previous')['url'];
            if (strpos($previous_url, 'register') == false
                && strpos($previous_url, 'login') == false ) {
                $request->session()->push('previous_url', $previous_url);
            }
        } catch(\Exception $e){
            //
        }

        return view('Auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        notify_bottom($title = 'welcome ' . Auth()->user()->name , $message = '');

        //if there is url in session
        if ($request->session()->exists('previous_url')) {
            $url = $request->session()->get('previous_url', 'default')[0];
            return redirect()->away($url);
        }

        return redirect()->intended();
        //return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
