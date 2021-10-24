<?php

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ExpanseController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\SalaryController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

Route::apiResource('/employee', EmployeeController::class);

Route::apiResource('/supplier', SupplierController::class);

Route::apiResource('/category', CategoryController::class);

Route::apiResource('/product', ProductController::class);

Route::apiResource('/expense', ExpanseController::class);

Route::post('/salary/paid/{id}', [SalaryController::class , 'paid']);

Route::get('/salary', [SalaryController::class , 'allSalary']);

Route::get('/salary/view/{id}', [SalaryController::class , 'viewSalary']);

Route::get('edit/salary/{id}', [SalaryController::class , 'editSalary']);


Route::post('/salary/update/{id}', [SalaryController::class , 'salaryUpdate']);
