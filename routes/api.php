<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\EmpresaController;


Route::group(['prefix' => 'v1'], function(){
    Route::apiResource('empresas', EmpresaController::class);
});