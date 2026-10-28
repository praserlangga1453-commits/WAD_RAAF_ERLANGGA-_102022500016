<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PerlengkapanController;

Route::redirect('/', '/perlengkapan');
Route::resource('perlengkapan', PerlengkapanController::class);
