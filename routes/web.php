<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DependentDropdownController;

use App\Http\Controllers\PDFController;

use App\Http\Controllers\Admin\AdminLoginController;

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminCustomerController;
use App\Http\Controllers\Admin\AdminNelayanController;
use App\Http\Controllers\Admin\AdminProdukController;
use App\Http\Controllers\Admin\AdminKategoriController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminTransaksiController;

use App\Http\Controllers\Nelayan\NelayanLoginController;
use App\Http\Controllers\Nelayan\NelayanRegisterController;

use App\Http\Controllers\Nelayan\NelayanDashboardController;
use App\Http\Controllers\Nelayan\NelayanProdukController;
use App\Http\Controllers\Nelayan\NelayanAccountController;
use App\Http\Controllers\Nelayan\NelayanOrderController;
use App\Http\Controllers\Nelayan\NelayanTransaksiController;

use App\Http\Controllers\User\UserLoginController;
use App\Http\Controllers\User\UserRegisterController;

use App\Http\Controllers\User\UserLandingController;

use App\Http\Controllers\User\Marketplace\MarketplaceLandingController;
use App\Http\Controllers\User\Marketplace\MarketplaceDetailController;
use App\Http\Controllers\User\Marketplace\MarketplaceFavoritController;
use App\Http\Controllers\User\Marketplace\MarketplaceCartController;
use App\Http\Controllers\User\Marketplace\MarketplaceCheckoutController;
use App\Http\Controllers\User\Marketplace\MarketplaceActivityController;
use App\Http\Controllers\User\Marketplace\MarketplacePembayaranController;
use App\Http\Controllers\User\Marketplace\MarketplaceAccountController;
use App\Http\Controllers\User\Marketplace\MarketplaceReviewController;

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


Route::get('cities', [DependentDropdownController::class, 'cities'])->name('cities');
Route::get('districts', [DependentDropdownController::class, 'districts'])->name('districts');
Route::get('villages', [DependentDropdownController::class, 'villages'])->name('villages');

Route::get('loginadmin', [AdminLoginController::class, 'loginadmin'])->name('loginadmin');

Route::post('proses_loginadmin', [AdminLoginController::class, 'proses_loginadmin'])->name('proses_loginadmin');

Route::get('logoutadmin', [AdminLoginController::class, 'logoutadmin'])->name('logoutadmin');

Route::prefix('admin')->group(function () {
    Route::prefix('dashboard')->name('dashboard.')->group(function () {
        Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
    });

    Route::prefix('datacustomer')->name('datacustomer.')->group(function () {
        Route::get('/', [AdminCustomerController::class, 'index'])->name('index');
        Route::get('/show/{id}', [AdminCustomerController::class, 'show'])->name('show');
        Route::get('/delete/{id}', [AdminCustomerController::class, 'delete'])->name('delete');
    });

    Route::prefix('datanelayan')->name('datanelayan.')->group(function () {
        Route::get('/', [AdminNelayanController::class, 'index'])->name('index');
        Route::get('/create', [AdminNelayanController::class, 'create'])->name('create');
        Route::post('/store',  [AdminNelayanController::class, 'store'])->name('store');
        Route::get('/show/{id}', [AdminNelayanController::class, 'show'])->name('show');
        Route::get('/update/{id}', [AdminNelayanController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminNelayanController::class, 'delete'])->name('delete');
    });

    Route::prefix('datakategori')->name('datakategori.')->group(function () {
        Route::get('/', [AdminKategoriController::class, 'index'])->name('index');
        Route::get('/create', [AdminKategoriController::class, 'create'])->name('create');
        Route::post('/store', [AdminKategoriController::class, 'store'])->name('store');
        Route::get('/show/{id}', [AdminKategoriController::class, 'show'])->name('show');
        Route::post('/update/{id}', [AdminKategoriController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminKategoriController::class, 'delete'])->name('delete');
    });

    Route::prefix('dataproduk')->name('dataproduk.')->group(function () {
        Route::get('/', [AdminProdukController::class, 'index'])->name('index');
        Route::get('/create', [AdminProdukController::class, 'create'])->name('create');
        Route::post('/store', [AdminProdukController::class, 'store'])->name('store');
        Route::get('/show/{id}', [AdminProdukController::class, 'show'])->name('show');
        Route::post('/update/{id}', [AdminProdukController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminProdukController::class, 'delete'])->name('delete');
    });

    Route::prefix('dataorder')->name('dataorder.')->group(function () {
        Route::get('/', [AdminOrderController::class, 'index'])->name('index');
        Route::get('/barangkirim/{id}', [AdminOrderController::class, 'barangkirim'])->name('barangkirim');
        Route::get('/cetakpesanan/{no_order}', [PDFController::class, 'cetakpesanan'])->name('cetakpesanan');
    });

    Route::prefix('datatransaksi')->name('datatransaksi.')->group(function () {
        Route::get('/', [AdminTransaksiController::class, 'index'])->name('index');
        Route::get('/aprovepem/{id}', [AdminTransaksiController::class, 'aprovepem'])->name('aprovepem');;
    });
    
});

Route::get('loginnelayan', [NelayanLoginController::class, 'loginnelayan'])->name('loginnelayan');
Route::get('registernelayan', [NelayanRegisterController::class, 'registernelayan'])->name('registernelayan');

Route::post('proses_loginnelayan', [NelayanLoginController::class, 'proses_loginnelayan'])->name('proses_loginnelayan');
Route::post('proses_registernelayan',  [NelayanRegisterController::class, 'proses_registernelayan'])->name('proses_registernelayan');

Route::get('logoutnelayan', [NelayanLoginController::class, 'logoutnelayan'])->name('logoutnelayan');

Route::prefix('nelayan')->group(function () {
    Route::prefix('dashboardnelayan')->name('dashboardnelayan.')->group(function () {
        Route::get('/', [NelayanDashboardController::class, 'index'])->name('index');
    });

    Route::prefix('produknelayan')->name('produknelayan.')->group(function () {
        Route::get('/', [NelayanProdukController::class, 'index'])->name('index');
        Route::get('/create', [NelayanProdukController::class, 'create'])->name('create');
        Route::post('/store', [NelayanProdukController::class, 'store'])->name('store');
        Route::get('/show/{id}', [NelayanProdukController::class, 'show'])->name('show');
        Route::post('/update/{id}', [NelayanProdukController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [NelayanProdukController::class, 'delete'])->name('delete');
    });

    Route::prefix('accountnelayan')->name('accountnelayan.')->group(function () {
        Route::get('/', [NelayanAccountController::class, 'index'])->name('index');
        Route::post('/update', [NelayanAccountController::class, 'update'])->name('update');
    });

    Route::prefix('ordernelayan')->name('ordernelayan.')->group(function () {
        Route::get('/', [NelayanOrderController::class, 'index'])->name('index');
        Route::get('/barangkirim/{id}', [NelayanOrderController::class, 'barangkirim'])->name('barangkirim');
        Route::get('/cetakpesanan/{no_order}', [PDFController::class, 'cetakpesanan'])->name('cetakpesanan');
    });

    Route::prefix('transaksinelayan')->name('transaksinelayan.')->group(function () {
        Route::get('/', [NelayanTransaksiController::class, 'index'])->name('index');
        Route::get('/aprovepem/{id}', [NelayanTransaksiController::class, 'aprovepem'])->name('aprovepem');;
    });
    
});

Route::get('auth/redirect', [UserLoginController::class, 'redirectToProvider']);
Route::get('auth/callback', [UserLoginController::class, 'handleProviderCallback']);

Route::get('loginuser', [UserLoginController::class, 'loginuser'])->name('loginuser');
Route::post('proses_loginuser', [UserLoginController::class, 'proses_loginuser'])->name('proses_loginuser');

Route::get('registeruser', [UserRegisterController::class, 'registeruser'])->name('registeruser');
Route::post('proses_registeruser', [UserRegisterController::class, 'proses_registeruser'])->name('proses_registeruser');

Route::get('logoutuser', [UserLoginController::class, 'logoutuser'])->name('logoutuser');

Route::prefix('/')->group(function () {
    Route::prefix('/')->name('landing.')->group(function () {
        Route::get('/', [UserLandingController::class, 'index'])->name('index');
    }); 

    Route::prefix('/marketplace')->name('marketplace.')->group(function () {
        Route::get('/', [MarketplaceLandingController::class, 'index'])->name('index');
    }); 

    Route::prefix('/detail')->name('detail.')->group(function () {
        Route::get('/{id}', [MarketplaceDetailController::class, 'index'])->name('index');
    }); 
    
    Route::prefix('/favorit')->name('favorit.')->group(function () {
        Route::get('/', [MarketplaceFavoritController::class, 'index'])->name('index')->middleware('auth');
        Route::get('/create/{id}', [MarketplaceFavoritController::class, 'create'])->name('create')->middleware('auth');
        Route::get('/delete/{id}', [MarketplaceFavoritController::class, 'delete'])->name('delete')->middleware('auth');
    });

    Route::prefix('/cart')->name('cart.')->group(function () {
        Route::get('/', [MarketplaceCartController::class, 'index'])->name('index')->middleware('auth');
        Route::post('/create/{id}', [MarketplaceCartController::class, 'create'])->name('create')->middleware('auth');
        Route::get('/update/{id}', [MarketplaceCartController::class, 'updatemin'])->name('updatemin')->middleware('auth');
        Route::get('/updateplus/{id}', [MarketplaceCartController::class, 'updateplus'])->name('updateplus')->middleware('auth');
        Route::get('/delete/{id}', [MarketplaceCartController::class, 'delete'])->name('delete')->middleware('auth');
    });

    Route::prefix('/checkout')->name('checkout.')->group(function () {
        Route::get('/', [MarketplaceCheckoutController::class, 'index'])->name('index')->middleware('auth');
        Route::get('/checkout', [MarketplaceCheckoutController::class, 'checkout'])->name('checkout')->middleware('auth');
        Route::get('/create', [MarketplaceCheckoutController::class, 'create'])->name('create')->middleware('auth');
    });

    Route::prefix('/activity')->name('activity.')->group(function () {
        Route::get('/', [MarketplaceActivityController::class, 'index'])->name('index')->middleware('auth');
        Route::get('/barangsampai/{id}', [MarketplaceActivityController::class, 'barangsampai'])->name('barangsampai');
        Route::get('/cetaknota/{no_order}', [PDFController::class, 'cetaknota'])->name('cetaknota');
    });

    Route::prefix('/bayar')->name('bayar.')->group(function () {
        Route::get('/{id}', [MarketplacePembayaranController::class, 'index'])->name('index')->middleware('auth');
        Route::post('/updateimg/{id}', [MarketplacePembayaranController::class, 'updateimg'])->name('updateimg')->middleware('auth');
    });

    Route::prefix('/account')->name('account.')->group(function () {
        Route::get('/', [MarketplaceAccountController::class, 'index'])->name('index')->middleware('auth');
        Route::post('/update', [MarketplaceAccountController::class, 'update'])->name('update');
    });

    Route::prefix('review')->name('review.')->group(function () {
        Route::get('{id}', [MarketplaceReviewController::class, 'index'])->name('index')->middleware('auth');
        Route::post('/create/{id}', [MarketplaceReviewController::class, 'create'])->name('create');
    });
}); 

// Route::get('/', function () {
//     return view('User.Page.Marketplace.Page.Review.Review');
// });
