<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
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

class ProfileController extends Controller
{
    use LangTrait;

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $locale)
    {
        $_SESSION["lang"] = "/user/create";
        LangTrait::lang($locale);
        abort_if(!Auth::user(), 403);
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!Auth::user(), 403);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            "password" => ["required"],
            "_token" => ["required"],
        ]);
        $data["remember_token"] = $data["_token"];
        $data['email_verified_at'] = Carbon::now();
        User::create($data);
        return redirect("/");
    }
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request, string $locale): View
    {
        $_SESSION["lang"] = "/user/create";
        LangTrait::lang($locale);
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
