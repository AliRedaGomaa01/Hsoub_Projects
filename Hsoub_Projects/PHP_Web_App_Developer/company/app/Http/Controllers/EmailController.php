<?php

namespace App\Http\Controllers;

use App\Jobs\EmailJob;
use App\Mail\Emails;
use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
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

class EmailController extends Controller
{
    use LangTrait;

    /**
     * Store new Email in emails table.
     */
    public function subscribe(Request $request)
    {
        $data = $request->validate([
            "email" => 'required',
        ]);
        $data["slug"] = Str::random(10);
        Email::create($data);
        return redirect("/");
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $locale)
    {
        abort_if(!Auth::user(), 403);
        $_SESSION["lang"] = "/e/create";
        LangTrait::lang($locale);
        return view('pages.email.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!Auth::user(), 403);
        $data = $request->validate([
            "subject" => 'required',
            "message" => "required",
        ]);
        $esubject = $data["subject"];
        $emessage = $data["message"];
        // $email = Email::firstOrFail();
        // $slug = $email->slug;
        // $recipient = $email->email;
        // Mail::to($recipient)->send(new Emails($slug, $esubject, $emessage));
        Email::chunk(25, function ($recipients) use ($esubject, $emessage) {
            EmailJob::dispatch($recipients, $esubject, $emessage);
        });
        return view('pages.email.create');
    }
    // interminal php artisan queue:work --timeout=600

    /**
     * Display the specified resource.
     */
    public function show(Email $email)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Email $email)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Email $email)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        $email->delete();
        $emessage = "تم الحذف بنجاح deleted successfully";
        return view("pages.email.template", compact("emessage"));
    }
}
