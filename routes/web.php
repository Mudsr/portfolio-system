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

    Route::get('/', [PortfolioController::class, 'index']);

    Route::resource('portfolio', PortfolioController::class);
    Route::post('portfolios/switch', [PortfolioController::class, 'switchPortfolio'])->name('switch.portfolio');
    Route::post('portfolios/{portfolio}/close', [PortfolioController::class, 'closePortfolio'])->name('close.portfolio');
    Route::resource('clients', ClientController::class);
    Route::resource('documents', DocumentController::class);

    Route::get('/dashboard', function () {
                return view('dashboard');
    })->name('dashboard');

});


require __DIR__.'/auth.php';
