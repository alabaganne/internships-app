<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UniversitySupervisorController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');

Route::get('/about', function() {
    // code
})->name('about');
Route::get('/contact', function() {
    // code
})->name('contact');

require __DIR__.'/auth.php';

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::resource('internships', InternshipController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('students', StudentController::class);
    Route::resource('supervisors', UniversitySupervisorController::class);
    Route::resource('fields', FieldController::class);
    Route::resource('skills', SkillController::class);
});