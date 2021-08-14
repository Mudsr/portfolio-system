<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DocumentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;

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

Route::middleware(['auth'])->group(function () {

    //portfolios routes
    Route::get('/', [PortfolioController::class, 'index']);
    Route::resource('portfolio', PortfolioController::class)->except('show');
    Route::post('portfolios/switch', [PortfolioController::class, 'switchPortfolio'])->name('switch.portfolio');
    Route::get('portfolios/{portfolio}/close', [PortfolioController::class, 'closePortfolioForm'])->name('close.portfolio.form');
    Route::post('portfolios/{portfolio}/close', [PortfolioController::class, 'closePortfolio'])->name('close.portfolio');
    //clients routes
    Route::resource('clients', ClientController::class)->except('show');
    //documents routes
    Route::resource('documents', DocumentController::class);
});


require __DIR__.'/auth.php';
