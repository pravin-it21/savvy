<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/', function() {
    return view('index');
});


Route::get('/listings', function() {
    return view('listings', [
        'heading' => 'Latest listings',
        'listings' => [
            [
                'id' => 1,
                'title' => 'List No 1',
                'description' => 'resto the restaurant page that was the best in the world to server the food whatever the customer want and it delievr that food within 1 mins '
            ],
            [
                'id' => 2,
                'title' => 'List No 2',
                'description' => 'resto the restaurant page that was the best in the world to server the food whatever the customer want and it delievr that food within 1 mins '
            ]
        ]
    ]);
});

Route::get('/hello', function () {
    return response('<h1>Hello world</h1>', 200)
    ->header('Content-TYype', 'text/plain')
    ->header('foo', 'bar');

});

Route::get('/posts/{id}', function($id){
    ddd($id);
    return response('Post ' . $id);
})->where('id', '[0-9]+');

Route::get('search', function(Request $request) {
    return $request->name . ' ' . $request->city;
});
