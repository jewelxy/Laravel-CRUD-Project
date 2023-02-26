<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;

//Show Data
Route::get('/',[CrudController::class,'showData']);
Route::get('/addData',[CrudController::class,'addData']);

//As we send data from user so using post method
//Create Data
Route::post('/storeData',[CrudController::class,'storeData']); 

//Edit
Route::get('/editeData/{id}',[CrudController::class,'editeData']); 
Route::post('/updateData/{id}',[CrudController::class,'updateData']);

//Delete
Route::get('/deleteData/{id}',[CrudController::class,'deleteData']);