<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

class ProjectController extends Controller
{
    use LangTrait;

    /**
     * Display a listing of the resource.
     */
    public function index(string $locale)
    {
        $projects = Project::all();
        $_SESSION["lang"] = "/home";
        LangTrait::lang($locale);
        return view('pages.home', compact("projects"));
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project, string $locale)
    {
        $_SESSION["lang"] = "projects/" . $project->slug;
        LangTrait::lang($locale);
        return view('pages.project.show', compact("project"));
    }

    /**
     * Rendering the page "Projects Management".
     */

    public function manage(string $locale)
    {
        abort_if(!Auth::user(), 403);
        $projects = Project::all();
        $_SESSION["lang"] = "/p/manage";
        LangTrait::lang($locale);
        return view('pages.project.manage', compact("projects"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $locale)
    {
        abort_if(!Auth::user(), 403);
        $_SESSION["lang"] = "/p/create";
        LangTrait::lang($locale);
        return view('pages.project.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_if(!Auth::user(), 403);
        $data = $request->validate([
            'image' => ['required', 'mimes:jpeg,jpg,png,gif'],
            "nameEn" => 'required',
            "headerEn" => "required",
            'descriptionEn' => 'required',
            "nameAr" => 'required',
            "headerAr" => "required",
            'descriptionAr' => 'required',
        ]);
        // $image = $request['image']->store('projects', 'public');
        $file = $data["image"];
        $newName = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('/ImagesOfProjects'), $newName);
        $data['image'] = $newName;
        $data['slug'] = Str::random(10);
        Project::create($data);
        return redirect("/");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project, string $locale)
    {
        abort_if(!Auth::user(), 403);
        $_SESSION["lang"] = "p/edit/" . $project->slug;
        LangTrait::lang($locale);
        return view('pages.project.edit', compact("project"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        abort_if(!Auth::user(), 403);
        $data = $request->validate([
            'image' => ['nullable', 'mimes:jpeg,jpg,png,gif'],
            "nameEn" => 'required',
            "headerEn" => "required",
            'descriptionEn' => 'required',
            "nameAr" => 'required',
            "headerAr" => "required",
            'descriptionAr' => 'required',
        ]);
        if ($request->has('image')) {
            $file = $data["image"];
            $newName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/ImagesOfProjects'), $newName);
            $data['image'] = $newName;
        };
        // $data['slug'] = Str::random(10);
        $project->update($data);
        return redirect("/");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        abort_if(!Auth::user(), 403);
        Storage::delete('public/' . $project->image);
        $project->delete();
        return redirect('/');
    }
}
