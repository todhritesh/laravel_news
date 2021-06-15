<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;


// Route::get('/', function () {
//     return view('home');
// });

route::get('/',[NewsController::class,"home"]);

route:: post('news/publish',[NewsController::class,"publishNews"])->name('publish');
route:: get('news/delete/{id}',[NewsController::class,"delete"])->name('delete');
