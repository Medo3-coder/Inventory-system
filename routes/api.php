<?php

use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ExpanseController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\PosController;
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

Route::apiResource('/customer', CustomerController::class);

Route::apiResource('/expense', ExpanseController::class);

Route::post('/salary/paid/{id}', [SalaryController::class , 'paid']);

Route::get('/salary', [SalaryController::class , 'allSalary']);

Route::get('/salary/view/{id}', [SalaryController::class , 'viewSalary']);

Route::get('edit/salary/{id}', [SalaryController::class , 'editSalary']);


Route::post('/salary/update/{id}', [SalaryController::class , 'salaryUpdate']);


Route::post('/stock/update/{id}', [ProductController::class , 'stockUpdate']);


Route::apiResource('/product', ProductController::class);


Route::get('/getting/product/{id}', [PosController::class , 'getProduct']);




//add to cart Route
Route::get('/addToCart/{id}', [CartController::class , 'addToCart']);

Route::get('/cart/product', [CartController::class , 'cartProduct']);


Route::get('/remove/cart/{id}', [CartController::class , 'removeCart']);

Route::get('/increment/{id}', [CartController::class , 'increment']);
Route::get('/decrement/{id}', [CartController::class , 'decrement']);




//vat Route

Route::get('/vats', [CartController::class , 'vats']);
Route::post('/orderdone', [PosController::class , 'orderDone']);



// order Route
Route::get('/orders', [OrderController::class , 'TodayOrder']);

Route::get('/order/details/{id}', [OrderController::class , 'OrderDetails']);

Route::get('/order/orderdetails/{id}', [OrderController::class , 'OrderDetailsAll']);

Route::post('/search/order/', [PosController::class , 'SearchOrderDate']);


//Admin Dashboard RouteTodayIncome

 Route::get('/today/sell', [PosController::class,'TodaySell']);
 Route::Get('/today/income', [PosController::class,'TodayIncome']);
 Route::Get('/today/due',  [PosController::class,'TodayDue']);
 Route::Get('/today/expense', [PosController::class,'TodayExpense']);
 Route::Get('/today/stockout', [PosController::class,'Stockout']);
