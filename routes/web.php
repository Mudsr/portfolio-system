<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DealController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\RenewalController;
use Illuminate\Http\Request;

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
    Route::get('/', function(Request $request){
        return redirect()->route('dashboard');
    });
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('portfolio', PortfolioController::class)->except('show');
    Route::post('portfolios/switch', [PortfolioController::class, 'switchPortfolio'])->name('switch.portfolio');
    Route::get('portfolios/{portfolio}/close', [PortfolioController::class, 'closePortfolioForm'])->name('close.portfolio.form');
    Route::post('portfolios/{portfolio}/close', [PortfolioController::class, 'closePortfolio'])->name('close.portfolio');
    //clients routes
    Route::resource('clients', ClientController::class)->except('show');
    //documents routes
    Route::resource('documents', DocumentController::class)->except('show','edit','update');
    //plots routes
    Route::resource('deals', DealController::class)->except('edit', 'update', 'show');
    //Renewals
    Route::resource('renewals', RenewalController::class)->except('edit', 'update', 'show');
    //Merge & Split
    Route::resource('merge-split', DealController::class)->except('edit', 'update', 'show');
    //Transfer
    Route::resource('transfers', DealController::class)->except('edit', 'update', 'show');
});


require __DIR__.'/auth.php';
