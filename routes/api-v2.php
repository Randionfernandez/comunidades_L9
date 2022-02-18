<?php

use App\Http\Controllers\Api\ComunidadController;
use App\Http\Controllers\Api\MovimientoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::name('api.v2')->apiResource('vayapordios', ComunidadController::class)->parameter('comunidades', 'comunidad'); 

