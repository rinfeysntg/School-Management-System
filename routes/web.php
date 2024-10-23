<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function (){
    return view('login');
});

//test

Route::get('/registrar', function (){
    return view('registrar.registrar_dashboard');
});

Route::get('/create_building', function (){
    return view('registrar.create_building');
});

