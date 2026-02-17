<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\EquipoComp;
use App\Livewire\ResponsablComp;
use App\Livewire\SolicitudComp;



Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('', function () {
    //     return view('dashboard');
    // })->name('');
  Route::get('/dashboard',SolicitudComp::class)->name('dashboard');
    Route::get('/RegistEquipos',EquipoComp::class)->name('RegistEquipo');

    Route::get('/RegistResponsabl',ResponsablComp::class)->name('RegistResponsabl');

     
});



