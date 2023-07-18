<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;




Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['auth','isAdmin']) ->group(function(){
    Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //category route
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function () {
        Route::get('/category', 'catfunction');
        Route::get('/category/creatCat', 'catcreatefunction');
        Route::post('/category', 'saveCategory');
        Route::get('/category/{category}/edit', 'edit');
        Route::put('/category/{category}', 'update');
    });

                //route name  //controller pathe                                 //function name
    // Route::get('category',[App\Http\Controllers\Admin\CategoryController::class,'catfunction']);
    // Route::get('category/creatCat',[App\Http\Controllers\Admin\CategoryController::class,'catcreatefunction']);
    // Route::post('category',[App\Http\Controllers\Admin\CategoryController::class,'saveCategory']);
    
});
