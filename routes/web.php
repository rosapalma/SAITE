<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\EquipoComp;
use App\Livewire\ResponsablComp;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/RegistEquipos',EquipoComp::class)->name('RegistEquipo');

    Route::get('/RegistResponsabl',ResponsablComp::class)->name('RegistResponsabl');
     
});



