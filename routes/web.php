<?php

use App\Http\Controllers\HomeController;
use App\Http\Livewire\Admin\AdminDashboard;
use App\Http\Livewire\Client\ClientDashboard;
use App\Http\Livewire\User\UserDashboard;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth']], function (){
    Route::get('dashboard', AdminDashboard::class)->name('admin.dashboard');
});

Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth']], function (){
    Route::get('dashboard', UserDashboard::class)->name('user.dashboard');
});

Route::group(['prefix'=>'client', 'middleware'=>['isClient','auth']], function (){
    Route::get('dashboard', ClientDashboard::class)->name('client.dashboard');
});
