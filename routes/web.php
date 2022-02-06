<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DevelopersController;
use App\Http\Controllers\AppsController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Auth::routes(["register" => false]);


Route::middleware("auth")->prefix("admin")->name("admin.")->group(function(){

    Route::get("dashboard",[DashboardController::class,"index"])->name("dashboard.index");
    Route::get("/",[DashboardController::class,"index"])->name("dashboard.index");


    Route::resource('developers', DevelopersController::class);


});


Route::get("/apps/{id}/developer",[AppsController::class,"show"])->name("apps.show");



Route::get("/home",[HomeController::class,"index"])->name("home");
Route::get("/",[HomeController::class,"index"])->name("home");


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', function () {
//     return redirect('/ios_accounts/');
// })->name('home');



