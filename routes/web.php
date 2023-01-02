<?php

use App\Models\User;
use App\Notifications\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {

$data = [
    'name' => 'Laptop',
    'invoice_no' => 'INV-021',
    'price' => 1250
];
 User::find(1)->notify((new Product($data)));
    return view('welcome');
});
Route::get('mark-read',function(){
    Auth::user()->unreadNotifications->markAsRead();
    return back();
});
Route::get('products', [ProductController::class, 'index']);
Route::get('add-product',[ProductController::class,'create']);
Route::post('add-product',[ProductController::class,'store']);
Route::get('edit-product/{id}', [ProductController::class, 'edit']);
Route::put('update-product/{id}', [ProductController::class, 'update']);
Route::get('delete-product/{id}', [ProductController::class, 'destroy']);

Route::get('/send-notification', [ProductController::class, 'sendOfferNotification']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');