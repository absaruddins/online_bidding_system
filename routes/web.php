<?php

use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('user_dashboard');
});
Route::get('/user_dashboard', function () {
    return view('user_dashboard');
});
Route::get('/user_bidding_product', function () {
    return view('user_bidding_product');
});
Route::get('/user_about', function () {
    return view('user_about');
});
Route::get('/user_contact', function () {
    return view('user_contact');
});
Route::get('/master', function () {
    return view('layout.master');
});

Route::get('/login', function () {
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});
