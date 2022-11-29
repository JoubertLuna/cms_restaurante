<?php

use App\Http\Controllers\Painel\{
  HomeController,
  OfficeController,
  TableController
};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

  #Home
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  #Home

  #Office
  Route::get('office/excluir/{id}', [OfficeController::class, 'excluir'])->name('office.excluir');
  Route::resource('office', OfficeController::class);
  #Office

  #Table
  Route::get('table/excluir/{id}', [TableController::class, 'excluir'])->name('table.excluir');
  Route::resource('table', TableController::class);
  #Table

});
