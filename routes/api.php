<?php

use App\Http\Controllers\MejaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
// use App\Models\Transaksi;

/*
|--------------------------------------------------------------------------
| API Routes
|---------------------------------------------------wwwwwww-----------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [AuthController::class, 'login']);

Route::group(['middleware' => ['auth.api']], function () {
    Route::group(['middleware' => ['api.kasir']], function () {
    });

    Route::group(['middleware' => ['api.admin']], function () {
    });

    Route::group(['middleware' => ['api.manager']], function () {
    });
});

//USER
Route::get('/getuser', [UserController::class, 'getuser']);
Route::get('/getkasir', [UserController::class, 'getkasir']);
Route::get('/getuser/{id}', [UserController::class, 'selectuser']);
Route::post('/createuser', [UserController::class, 'createuser']);
Route::put('/updateuser/{id}', [UserController::class, 'updateuser']);
Route::delete('/deleteuser/{id}', [UserController::class, 'deleteuser']);

// Meja
Route::get('/getmeja', [MejaController::class, 'getmeja']);
Route::get('/getmejakosong', [MejaController::class, 'mejatersedia']);
Route::get('/getmeja/{id}', [MejaController::class, 'selectmeja']);

Route::post('/createmeja', [MejaController::class, 'createmeja']);
Route::put('/updatemeja/{id}', [MejaController::class, 'updatemeja']);
Route::delete('/deletemeja/{id}', [MejaController::class, 'deletemeja']);

// MENU
Route::get('/getmenu', [MenuController::class, 'getmenu']);
Route::get('/getmenu/{id}', [MenuController::class, 'selectmenu']);
Route::post('/createmenu', [MenuController::class, 'createmenu']);
Route::put('/updatemenu/{id}', [MenuController::class, 'updatemenu']);
// Kalo update foto tetep pake post cuy 
Route::post('/updatephoto/{id}', [MenuController::class, 'updatephoto']);
Route::delete('/deletemenu/{id}', [MenuController::class, 'deletemenu']);

// TRANSAKSI
Route::get('/gethistory', [TransaksiController::class, 'gethistory']);
Route::get('/gethistory/{code}', [TransaksiController::class, 'selecthistory']);

Route::get('/gettransaksi', [TransaksiController::class, 'gettransaksi']);
Route::get('/get_ongoing_transaksi/{id}', [TransaksiController::class, 'getongoingtransaksi']);
Route::get('/gettotalharga/{id}', [TransaksiController::class, 'totalharga']);
Route::get('/gettotal/{code}', [TransaksiController::class, 'total']);
Route::get('/getcart', [TransaksiController::class, 'getcart']);
Route::get('/getongoing', [TransaksiController::class, 'ongoing']);
Route::put('/checkout', [TransaksiController::class, 'checkout']);
Route::put('/done_transaksi/{id}', [TransaksiController::class, 'donetransaksi']);
Route::get('/gettransaksi/{id}', [TransaksiController::class, 'selecttransaksi']);
Route::post('/tambahpesanan', [TransaksiController::class, 'tambahpesanan']);

Route::get('/getday/{date}', [TransaksiController::class, 'getdate']);
Route::get('/getmonth/{month}', [TransaksiController::class, 'getmonth']);
