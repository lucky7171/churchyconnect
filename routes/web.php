<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;


//landing page without authentication by user or admin
Route::get('/', [HomeController::class,'homepage']);

//if not admin redirect to this route, for users, use the named route homepage which i defined it
Route::get('/home', [HomeController::class,'homepage'])->middleware(['auth'])->name('homepage');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//created route for admin ,when user is admin will be taken to this route, use the middleware
Route::get('admin/dashboard', [HomeController::class,'index'])->middleware(['auth', 'admin']);


//billboard post
Route::get('/billboard_post', [AdminController::class,'billboard_post']);

//billboard add post
Route::post('/billboard_postadd', [AdminController::class,'billboard_postadd']);

//billboard show billboard
Route::get('/show_billboard', [AdminController::class,'show_billboard']);

//delete billboard,sending the id too, so fetch it
Route::get('/delete_billboard/{id}', [AdminController::class,'delete_billboard']);

//edit billboard
Route::get('/edit_billboard/{id}', [AdminController::class,'edit_billboard']);

//update billboard
Route::post('/update_billboard/{id}', [AdminController::class,'update_billboard']);