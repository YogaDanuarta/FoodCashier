<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\MasterstockController;
use App\Http\Controllers\MasteruserController;

use App\Http\Controllers\TransactionController;

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
    return view('Auth.login');
});


// Route::get("/login", [UserController::class, "login"])->name("login.from");



// Route::post("RegistHandle", [UserController::class, "registerUser"])->name("regist.function");
// Route::post("Login", [UserController::class, "FormRegist"])->name("regist.from");


// Route::resource('Auth', [UserController::class], [

//     'except' => ['index','FormRegist','edit', 'create']
// ]);



Auth::routes();

Route::resource('masterstock', MasterstockController::class, ['except' => ['register', 'edit', 'create']])->middleware('auth');


Route::resource('masteruser', MasteruserController::class, ['except' => ['register', 'edit']])->middleware('auth');


Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
// Route::get('transaction', [App\Http\Controllers\TransactionController::class, 'index'])->middleware('auth')->name('transaction');

// Route::get('addtransaction', [App\Http\Controllers\TransactionController::class, 'create'])->middleware('auth')->name('addTransaction');


// Route::post('posttransaction', [App\Http\Controllers\TransactionController::class, 'store'])->middleware('auth')->name('storetransaction');

Route::post('updateTransaction', [App\Http\Controllers\TransactionController::class,'update'])->middleware('auth')->name('updateTransaction');



Route::resource('transaction', TransactionController::class, ['except' => ['register', 'edit']])->middleware('auth');
