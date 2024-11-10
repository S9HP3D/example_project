<?php

use App\Http\Api\GuestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::apiResource('guests', GuestController::class);