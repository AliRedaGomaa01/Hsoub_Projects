<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

trait LangTrait
{
    public static function lang(string $locale = "en")
    {
        if ($locale) {
            try {
                if (!in_array($locale, ['en', 'ar'])) {
                    throw new Exception(__("lang error"));
                }
            } catch (Exception $e) {
                Session::flash('alert-danger', $e->getMessage());
                return view('pages.errors');
            }
            return App::setLocale($locale);
        }
    }
}

class AuthenticatedSessionController extends Controller
{
    use LangTrait;

    /**
     * Display the login view.
     */
    public function create(string $locale): View
    {
        $_SESSION["lang"] = "/user/create";
        LangTrait::lang($locale);
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
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
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
