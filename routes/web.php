<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

use App\Http\Controllers\NotificationController;

Route::get('/send-notification', [NotificationController::class, 'sendNotification'])->name('send.notification.all');
Route::get('/send-notification/{playerId}', [NotificationController::class, 'sendToUser']);
