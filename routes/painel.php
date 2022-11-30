<?php

use App\Http\Controllers\Painel\{
  BannerController,
  BlogController,
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

  #Banner
  Route::get('banner/excluir/{id}', [BannerController::class, 'excluir'])->name('banner.excluir');
  Route::resource('banner', BannerController::class);
  #Banner

  #Blog
  Route::get('blog/excluir/{id}', [BlogController::class, 'excluir'])->name('blog.excluir');
  Route::resource('blog', BlogController::class);
  #Blog

});
