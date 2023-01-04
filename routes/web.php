<?php

use App\Models\User;
use Illuminate\Support\Arr;
use App\Notifications\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', function () {
/*
$data = [
    'name' => 'Laptop',
    'invoice_no' => 'INV-021',
    'price' => 1250
];
 User::find(1)->notify((new Product($data)));*/
 /*
 $collection = collect(['Hello', 'World', null])->map(function ($name) {
    return strtolower($name);
})->reject(function ($name) {
    return empty($name);
});*/
//$data = [1,2,3];
//$collection = collect($data);
//$average = collect([ ['foo' => 10],['foo' => 10],['foo' => 20],['foo' => 40]])->avg('foo');
//$average = collect([1, 1, 2, 4])->avg();
//$collection = collect([1, 2, 3, 4, 5, 6, 7,8]); // chunk method breaks the collection into multiple, smaller collections of a given size:

//$chunks = $collection->chunk(4);

//$chunks->all();
//$collection = collect([[1, 2, 3],[4, 5, 6],[7, 8, 9],]);

//$collapsed = $collection->collapse();
//$collapsed->all();
//$collectionA = collect([1, 2, 3]);

//$collectionB = $collectionA->collect();

//$collectionB->all();
//$collection = collect(['name', 'age']);
//$combined = $collection->combine(['George', 29]);
//$combined->all();
//$collection = collect([1, 2]);

//$matrix = $collection->crossJoin(['a', 'b'], ['I', 'II']);


$array = Arr::collapse([[1, 2, 3], [4, 5, 6], [7, 8, 9]]);
 dd($array);
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