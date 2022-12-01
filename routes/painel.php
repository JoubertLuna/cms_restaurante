<?php

use App\Http\Controllers\Painel\{
  BannerController,
  BlogController,
  CategoryController,
  ContactController,
  HomeController,
  OfficeController,
  ProductController,
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

  #Category
  Route::get('category/excluir/{id}', [CategoryController::class, 'excluir'])->name('category.excluir');
  Route::resource('category', CategoryController::class);
  #Category

  #Product
  Route::get('product/excluir/{id}', [ProductController::class, 'excluir'])->name('product.excluir');
  Route::resource('product', ProductController::class);
  #Product

  #Contact
  Route::get('contact/excluir/{id}', [ContactController::class, 'excluir'])->name('contact.excluir');
  Route::resource('contact', ContactController::class);
  #Contact

});
