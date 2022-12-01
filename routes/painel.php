<?php

use App\Http\Controllers\Painel\{
  AdminController,
  BannerController,
  BlogController,
  CategoryController,
  ChefController,
  ContactController,
  FinanceController,
  HomeController,
  OfficeController,
  ProductController,
  TableController,
  UserController,
  WaiterController
};
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

  #Home / Chef / Waiter / Finance / Admin
  Route::get('/home', [HomeController::class, 'index'])->name('home');
  Route::resource('chef', ChefController::class);
  Route::resource('waiter', WaiterController::class);
  Route::resource('finance', FinanceController::class);
  Route::resource('admin', AdminController::class);
  #Home / chef / Waiter / Finance / Admin

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

  #User
  Route::get('user/excluir/{id}', [UserController::class, 'excluir'])->name('user.excluir');
  Route::resource('user', UserController::class);
  #User

});
