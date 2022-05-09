<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AddMember;
use App\Http\Controllers\MemberController;
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
Route::get('/', function () {
   return view('welcome');
});
Route::view("add","addmember");
Route::post("add",[MemberController::class,"addData"]);

Route::get("list",[MemberController::class,"show"]);
Route::get("delete/{id}",[MemberController::class,"delete"]);
Route::get("edit/{id}",[MemberController::class,"showdata"]);
Route::post("edit",[MemberController::class,"update"]);
Route::get("search",[MemberController::class,"search"]);
Route::view("head","head");



