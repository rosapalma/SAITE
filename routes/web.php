<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\EquipoComp;
//use App\Livewire\ResponsablComp;
use App\Livewire\SolicitudComp;
use App\Livewire\UserSoporteComp;
use App\Livewire\UsuarioComp;
use App\Livewire\AsigServicioComp;
use App\Livewire\BitacoraComp;



// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/prueba', function (){
    return view('prueba');
});
Route::redirect('/','login'); //al login directament

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Route::get('', function () {
    //     return view('dashboard');
    // })->name('');
    Route::get('/dashboard',SolicitudComp::class)->name('dashboard');
    Route::get('/usuarios',UsuarioComp::class)->name('usuarios');
    Route::get('/RegistEquipos',EquipoComp::class)->name('RegistEquipo');
    Route::get('/AsigServicio',AsigServicioComp::class)->name('AsigServicio');
    Route::get('/Bitacora', BitacoraComp::class)->name('Bitacora');

   //Route::get('/RegistResponsabl',ResponsablComp::class)->name('RegistResponsabl');

     
});



