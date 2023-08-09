<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

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

// all listings
Route::get('/', [ListingController::class, 'index']);

// show create form
Route::get('/listings/create', [ListingController::class, 'create'])->middleware('auth');

// store listing
Route::post('/listings', [ListingController::class, 'store'])->middleware('auth');

// show edit form
Route::get('/listings/{listing}/edit',
[ListingController::class, 'edit'])->middleware('auth');

//update and edit
Route::put('/listings/{listing}', [ListingController::class,'update'])->middleware('auth');


//delete
Route::delete('/listings/{listing}', [ListingController::class,'destroy'])->middleware('auth');

// Manage Listings
Route::get('/listings/manage', [ListingController::class, 'manage'])->middleware('auth', 'admin');


// single listing
Route::get('/listings/{listing}', [ListingController::class, 'show']);

//show register create form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

//create new users

Route::post('/users', [UserController::class, 'store']);

//logut
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');

//login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

//login user
Route::post('/users/authenticate', [UserController::class, 'authenticate']);







