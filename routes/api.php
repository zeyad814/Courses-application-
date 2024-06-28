<?php

use App\Models\Instructor;
use Illuminate\Http\Request;
use App\Http\Middleware\setLocal;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\auth\authController;
use App\Http\Controllers\api\auth\userController;
use App\Http\Controllers\api\auth\adminController;
use App\Http\Controllers\api\admin\majorController;
use App\Http\Controllers\api\admin\courseController;
use App\Http\Controllers\api\admin\regionController;
use App\Http\Controllers\api\auth\authUserController;
use App\Http\Controllers\api\admin\subMajorController;
use App\Http\Controllers\api\auth\instructorController;
use App\Http\Controllers\api\admin\subSubMajorController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::group([
//     'prefix'=>'{locale?}',
//     'where' => ['locale'=>'[a-zA-Z]{2}'],
//     'middleware'=>'setLocale'], function(){


Route::post('/login',[authUserController::class,'login']);
Route::post('/register',[authUserController::class,'register']);
Route::post('/user-logout',[authUserController::class,'logout'])->middleware(['auth:sanctum']);

Route::post('/admin-login',[authController::class,'login']);
Route::post('/logout',[authController::class,'logout'])->middleware('auth:sanctum');
Route::post('auth/create-account',[authController::class,'createInstructor']);
// Route::delete('auth/create-account',[authController::class,'']);
Route::get('/profile/index',[authController::class,'profile'])->middleware('auth:sanctum');



Route::controller(majorController::class)->prefix('major')->group(function(){
    Route::get('/index',"index")->middleware('auth:sanctum');
    Route::post("/create",'create');
    Route::post("/update/{id}",'update');
    Route::delete("/delete/{id}",'destroy');
});
Route::controller(subMajorController::class)->prefix('sub-major')->group(function(){
    Route::get('/index',"index");
    Route::post("/create",'create');
    Route::post("/update/{id}",'update');
    Route::delete("/delete/{id}",'destroy');
});
Route::controller(subSubMajorController::class)->prefix('sub-sub-major')->group(function(){
    Route::get('/index',"index");
    Route::post("/create",'create');
    Route::post("/update/{id}",'update');
    Route::delete("/delete/{id}",'destroy');
});
Route::controller(regionController::class)->prefix('region')->group(function(){
    Route::get('/index',"index");
    Route::post("/create",'create');
    Route::post("/update/{id}",'update');
    Route::delete("/delete/{id}",'destroy');
});
Route::controller(adminController::class)->prefix('admin')->group(function(){
    Route::get('/index',"index");
    Route::post("/create",'create');
    Route::post("/update/{id}",'update');
    Route::delete("/delete/{id}",'destroy');
});
Route::controller(instructorController::class)->prefix('instructor')->group(function(){
    Route::get('/index',"index");
    Route::post("/create",'create');
    Route::post("/update/{id}",'update');
    Route::delete("/delete/{id}",'destroy');
});
Route::controller(userController::class)->prefix('users')->group(function(){
    Route::get('/index',"index");
    Route::delete("/delete/{id}",'destroy');
});
Route::controller(courseController::class)->prefix('course')->group(function(){
    Route::get('/index',"index");
    Route::post("/create",'create');
    Route::post("/update/{id}",'update');
    Route::delete("/delete/{id}",'destroy');
});






// });
