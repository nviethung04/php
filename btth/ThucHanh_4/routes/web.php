<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IssueController;
use App\Http\Controllers\ComputerController;

Route::resource('computers', ComputerController::class);
Route::resource('issues', IssueController::class);
Route::get('/', function () {
    return view('welcome');
});
