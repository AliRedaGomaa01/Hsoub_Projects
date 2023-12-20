<?php

use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use Mockery\Undefined;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
*
* ---------- Auth Routes ----------
*
*/

require __DIR__ . '/auth.php';

/*
*
* ---------- Redirecting ----------
*
*/

Route::get('/', function () {
    $projects = Project::all() ?: "";
    if ($projects == "") {
        return view('pages.home');
    };
    return view('pages.home', compact("projects"));
});

Route::get('/dashboard', function () {
    return redirect("/home/ar");
})->name('dashboard');

/*
*
* ---------- Users & ProfileController ----------
*
*/

Route::middleware('auth')->controller(ProfileController::class)->group(function () {
    Route::get('/user/create/{locale}', 'create');
    // ->name('profile.create');
    Route::get('/profile/{locale}', 'edit');
    // ->name('profile.edit');
    Route::post('/user/create', 'store')->name('profile.store');
    Route::patch('/profile', 'update')->name('profile.update');
    Route::delete('/profile', 'destroy')->name('profile.destroy');
});

/*
*
* ---------- Emails & EmailController ----------
*
*/

Route::controller(EmailController::class)->group(function () {
    Route::get('/e/create/{locale}', 'create');
    Route::post('/e/create', "store");
    Route::post('/e/subscribe', "subscribe");
    // Route::delete('/e/delete/{email:slug}', 'destroy');
    Route::get('/e/delete/{email:slug}', 'destroy');
});

/*
*
* ---------- Projects & PController ----------
*
*/

Route::controller(ProjectController::class)->group(function () {
    Route::get('/home/{locale}', "index")->name('project.index');
    Route::get('/projects/{project:slug}/{locale}', "show")->name('project.show');
    Route::get('/p/manage/{locale}', "manage")->name('project.manage')->middleware(['auth']);
    Route::get('/p/create/{locale}', "create")->name('project.create')->middleware(['auth']);
    Route::get('/p/edit/{project:slug}/{locale}', "edit")->name('project.edit')->middleware(['auth']);
    Route::post('/p/create', "store")->name('project.store')->middleware(['auth']);
    Route::patch('/p/update/{project:slug}', "update")->name('project.update')->middleware(['auth']);
    Route::delete('/p/delete/{project:slug}', "destroy")->name('project.destroy')->middleware(['auth']);
});

/*
*
* ---------- Test ----------
*
*/

// Route::get("/test", function () {
// });
