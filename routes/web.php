<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfessionalController;
use App\Http\Controllers\SchedulingController;
use App\Http\Controllers\ServiceController;
use App\Models\Scheduling;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->prefix('dashboard')->group(function(){

    Route::get('/', DashboardController::class)->name('dashboard');

    Route::put('schedule/change', [SchedulingController::class, 'change'])->name('schedule.change');
    Route::resource('schedule', SchedulingController::class);

    Route::resource('service', ServiceController::class);

    Route::resource('professional', ProfessionalController::class);

    Route::resource('category', CategoryController::class);

    Route::resource('client', ClientController::class);
    
    // Route::put('service/value/?{service}', [ServiceController::class, 'service_value'])->name('service.value');

});

//TODO
//Colocar mesagem caso der errado na hora de atualizar a categoria
//Fazer update profissonais e clients
// Retornar erro client e profissionais
//Configurar Role



