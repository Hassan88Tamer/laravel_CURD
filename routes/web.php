<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AddMember;
use App\Http\Controllers\EmplyeeController;
use App\Http\Controllers\MemberController;
use App\Imports\EmployeeImport;
use App\Mail\WellcomeMail;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;



                   //App not app


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


//Route::post("users",[UsersController::class,"getData"]);



 //views Route
Route::get('/', function () {               
   return view('welcome');
});


Route::view("add","addmember");
Route::view("filter","filter");
Route::view("head","head");
Route::view("import-form","import-form");
Route::view("/home","welcome");
Route::view("/home","welcome");



//post Route
Route::post("add",[MemberController::class,"addData"]);
Route::post("contact",[MemberController::class,"addData"]);
Route::post("edit",[MemberController::class,"update"]);
Route::post("import",[MemberController::class,"import"]);
Route::post("/formPost",[MemberController::class,"formPost"]);
Route::post("/form",[MemberController::class,"form"]);

//Get Route

Route::get("list",[MemberController::class,"show"]);
Route::get("delete/{id}",[MemberController::class,"delete"]);
Route::get("edit/{id}",[MemberController::class,"showdata"]);
Route::get("search",[MemberController::class,"search"]);
Route::get("filter",[MemberController::class,"filter"]);
Route::get("export-excel",[MemberController::class,"exportIntoExcel"]);
Route::get("export-csv",[MemberController::class,"exportIntoCSV"]);
Route::get('/email',[MemberController::class,"email"]);
Route::get("/alert",[MemberController::class,"alert"]);
Route::get("/login",[MemberController::class,"login"])->name("login");









Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
