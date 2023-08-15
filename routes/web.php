<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocumentTypeController;
use App\Http\Controllers\DocumentTypeDetailController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\SupplierController;
use App\Http\Resources\DocumentTypeDetail;

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

Route::get('/main', [PageController::class, 'main'])->name('main'); 

Route::get('/', [PageController::class, 'main'])->name('main'); 

Route::controller(AuthController::class)->middleware('loggedin')->group(function() {
    Route::get('login', 'loginView')->name('login.index');
    Route::post('login', 'login')->name('login.check');
    Route::get('register', 'registerView')->name('register.index');
    Route::post('register', 'register')->name('register.store');
});


Route::middleware('isLogged')->group(function() {
    Route::post('/print/template}', [PageController::class, 'print']);
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::controller(PageController::class)->group(function() {
 
        Route::get('/user-profile', 'profile')->name('profile');
        Route::get('/', 'dashboardOverview1')->name('dashboard-overview-1');
      
        Route::get('document-page', 'document')->name('document');
        Route::get('template-page', 'template')->name('template');
        Route::get('account-page', 'account')->name('account');

        Route::post('/document-type/store', [DocumentTypeController::class, 'store']);

        //Supplier CRUD
        Route::get('/supplier-page', 'supplier')->name('supplier');
        Route::post('/supplier/store', [SupplierController::class, 'store']);

        //Position CRUD
        Route::get('/position-page', 'position')->name('position');
        Route::post('/position/store', [PositionController::class, 'store']);

        //Personnel CRUD
        Route::get('/personnel-page', 'personnel')->name('personnel');
        Route::post('/personnel/store', [PersonnelController::class, 'store']);

    
      
    });
    Route::post('/print/template', [PageController::class, 'print']);
   
    
});
