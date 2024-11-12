<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;

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

Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');

Route::get('/rooms/create_rooms', [RoomController::class, 'create'])->name('rooms.create');

Route::post('/rooms', [RoomController::class, 'store'])->name('rooms.store');

Route::get('/rooms/{id}/edit', [RoomController::class, 'edit'])->name('rooms.edit');

Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');

Route::delete('/rooms/{id}', [RoomController::class, 'destroy'])->name('rooms.destroy');
