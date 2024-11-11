<?php

use App\Http\Api\GuestController;
use Illuminate\Support\Facades\Route;

Route::apiResource('guests', GuestController::class);

Route::any('/{any}', function () {
    return response()->json(['error' => 'error route'], 404);
})->where('any', '.*');