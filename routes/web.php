<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Warna\WarnaController;
use App\Http\Controllers\Hasil\HasilController;
use App\Http\Controllers\Merak\MerakController;
use App\Http\Controllers\Riwayat\RiwayatController;
use App\Http\Controllers\Perkawinan\PerkawinanController;


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

$controller_path = 'App\Http\Controllers';

// Main Page Route
Route::get('/dashboard', $controller_path .'\dashboard\Analytics@index')->name('dashboard-analytics')->middleware('LoginMiddleware');

// layout
Route::get('/layouts/without-menu', $controller_path . '\layouts\WithoutMenu@index')->name('layouts-without-menu');
Route::get('/layouts/without-navbar', $controller_path . '\layouts\WithoutNavbar@index')->name('layouts-without-navbar');
Route::get('/layouts/fluid', $controller_path . '\layouts\Fluid@index')->name('layouts-fluid');
Route::get('/layouts/container', $controller_path . '\layouts\Container@index')->name('layouts-container');
Route::get('/layouts/blank', $controller_path . '\layouts\Blank@index')->name('layouts-blank');

// pages
Route::get('/pages/account-settings-account', $controller_path . '\pages\AccountSettingsAccount@index')->name('pages-account-settings-account');
Route::get('/pages/account-settings-notifications', $controller_path . '\pages\AccountSettingsNotifications@index')->name('pages-account-settings-notifications');
Route::get('/pages/account-settings-connections', $controller_path . '\pages\AccountSettingsConnections@index')->name('pages-account-settings-connections');
Route::get('/pages/misc-error', $controller_path . '\pages\MiscError@index')->name('pages-misc-error');
Route::get('/pages/misc-under-maintenance', $controller_path . '\pages\MiscUnderMaintenance@index')->name('pages-misc-under-maintenance');

//auth
Route::get('/auth', $controller_path .'\Auth\LoginController@auth')->middleware('UserMiddleware');   
Route::post('/auth/login', $controller_path .'\Auth\LoginController@login')->middleware('UserMiddleware');   
Route::get('/auth/logout', $controller_path .'\Auth\LoginController@logout');   
Route::get('/auth/register', $controller_path .'\Auth\RegisterController@register')->middleware('UserMiddleware');   
Route::post('/auth/create', $controller_path .'\Auth\RegisterController@create')->middleware('UserMiddleware');
//Warna
Route::resource('warna',WarnaController::class)->middleware('LoginMiddleware');
//Hasil
Route::resource('hasil',HasilController::class)->middleware('LoginMiddleware');
//Merak
Route::resource('merak',MerakController::class)->middleware('LoginMiddleware');
//Riwayat
Route::resource('riwayat',RiwayatController::class)->middleware('LoginMiddleware');
//Perkawinan
Route::resource('perkawinan',PerkawinanController::class);