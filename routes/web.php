<?php

namespace App\Http\Controllers;

use App\Helpers\RoleHelper;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\produkController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('user');
});
// Route::get('ad_user', function () {
//     return view('ad_user');
// });

Route::get('/daftarproduk/{nama}', [KategoriController::class, 'index']);
Route::get('/daftarproduk/{kategori}/{idsubkategori}', [KategoriController::class, 'subIndex']);

Route::post('/addtocart/', [CartController::class, 'addTo'])->name('addtocart');
Route::post('/updateqty/', [CartController::class, 'updateQty'])->name('updateqty');
Route::get('/nota', [CartController::class, 'nota'])->name('nota');
Route::get('/pesanan/{kode_pesan}', [CartController::class, 'checkout'])->name('checkout');
Route::post('/post_pembeli/', [CartController::class, 'postPembeli'])->name('postpembeli');
Route::get('/by_order', [CartController::class, 'byOrder'])->name('byorder');

Route::get('/ad_about', function () {
    return view('ad_about');
});

Route::get('/beli', function () {
    return view('beli');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/request', function () {
    return view('request');
});

// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });

Route::get('/ad_by_order', function () {
    return view('ad_by_order');
});

Route::resource('produk', produkController::class);
Route::get('sub-kategori', [produkController::class, 'subKategori'])->name('produk.sub-kategori');


Route::post('/upload-photo', 'produkController@store')->name('uploadPhoto');




/*
Route::prefix('auth')->group(function(){
    Route::get('login',[Auth\LoginController::class, 'index'])->name('login');
    Route::get('register', [Auth\RegisterController::class, 'index'])->name('register');
});

*/

Auth::routes();
/*------------------------------------------

--------------------------------------------

All Admin Routes List

--------------------------------------------

--------------------------------------------*/

Route::middleware(['auth', 'user-access:' . RoleHelper::AdminText])->group(function () {
    Route::get('/ad_user', [HomeController::class, 'adminHome'])->name('ad_user');
});
