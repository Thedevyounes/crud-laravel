<?php

use App\Http\Controllers\DBcontroller;
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


// welcome page
Route::get('/', function () {
    return view('welcome');
});

// get all users with delete, modify and add user buttons
Route::get('/database', [
    DBcontroller::class, 'afficher'
]);

// go to form to add user
Route::get('/register', function () {
    return view('insertuser');
});

// add user to database
Route::post('/adduser', [
    DBcontroller::class, 'adduser'
]);

// delete user
Route::get('/delete/{id}', [
    DBcontroller::class, 'delete'
]);

// confirm delete
Route::get('/confirmdelete/{id}', [
    DBcontroller::class, 'confirmDelete'
]);

// modify user - go to form
Route::get('/modify/{id}', [
    DBcontroller::class, 'modify'
]);

// update user in database with new values and redirect to home
Route::post('/update', [
    DBcontroller::class, 'update'
]);