<?php

use Illuminate\Http\Request;
use App\Http\Livewire\Task\Show;
use App\Http\Livewire\Task\Index;
use App\Http\Livewire\Task\Create;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DealController;
use App\Http\Controllers\PlotController;
use App\Http\Controllers\MergeController;
use App\Http\Controllers\SplitController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\RenewalController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaiRentPaymentController;
use App\Http\Controllers\PortfolioController;
use App\Http\Livewire\Task\Complete;
use App\Models\Task;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

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

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/', function(Request $request){
        return redirect()->route('dashboard');
    });

    Route::get('/dashboard',App\Http\Livewire\Dashboard\Index::class)->name('dashboard');

    Route::resource('portfolio', PortfolioController::class)->except('show');
    Route::post('portfolios/switch', [PortfolioController::class, 'switchPortfolio'])->name('switch.portfolio');
    Route::get('portfolios/{portfolio}/close', [PortfolioController::class, 'closePortfolioForm'])->name('close.portfolio.form');
    Route::post('portfolios/{portfolio}/close', [PortfolioController::class, 'closePortfolio'])->name('close.portfolio');
    //clients routes
    Route::resource('clients', ClientController::class)->except('show');
    // //documents routes
    // Route::resource('documents', DocumentController::class)->except('show','edit','update');
    //plots routes
    Route::resource('deals', DealController::class);
    Route::get('deals/{deal}/renew', [DealController::class, 'renewForm'])->name('deal.renew.form');
    Route::put('deals/{deal}/renew', [DealController::class, 'renew'])->name('deal.renew');
    Route::get('deals/{deal}/close', [DealController::class, 'closeForm'])->name('deal.close.form');
    Route::post('deals/{deal}/close', [DealController::class, 'closeDeal'])->name('deal.close');
    Route::post('deals/search', [DealController::class, 'searchDeals'])->name('deals.search');

    Route::get('tasks', Index::class)->name('tasks.index');
    Route::get('tasks/create', Create::class)->name('tasks.create');
    Route::get('tasks/{task}/show', Show::class)->name('tasks.show');

    Route::get('tasks/{task}/complete', function(Request $request, Task $task){
        $task->completed_at = now();
        $task->save();

        if($request->rdr == 'd') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('tasks.index');
    })->name('tasks.complete');

    //Transfers
    Route::get('transfers', App\Http\Livewire\Transfer\Index::class)->name('transfers.index');
    Route::get('transfers/create', App\Http\Livewire\Transfer\Create::class)->name('transfers.create');
    //Merges
    Route::get('merge', App\Http\Livewire\Merge\Index::class)->name('merge.index');
    Route::get('merge/create', App\Http\Livewire\Merge\Create::class)->name('merge.create');
    Route::post('merge/save', [MergeController::class, 'save'])->name('merge.save');
    //Splits
    Route::get('split', App\Http\Livewire\Split\Index::class)->name('split.index');
    Route::get('split/create', App\Http\Livewire\Split\Create::class)->name('split.create');
    Route::post('split/save', [SplitController::class, 'save'])->name('split.save');

    Route::get('report/plot', App\Http\Livewire\Report\Index::class)->name('report.index');
    Route::get('report/expiry', App\Http\Livewire\Report\ExpiryReport::class)->name('report.expiry');
    Route::get('report/rent', App\Http\Livewire\Report\RentReport::class)->name('report.rent');

    Route::get('fee-calculation', App\Http\Livewire\FeeCalculation\Index::class)->name('fee-calculation.index');

    Route::get('view-detail', App\Http\Livewire\ViewDetail\Index::class)->name('view.detail');

    Route::get('pai-rent-payment', [PaiRentPaymentController::class, 'index'])->name('pai.rent.payment');
    Route::get('pai-rent-payment/create',  [PaiRentPaymentController::class, 'create'])->name('pai.rent.create');
    Route::post('pai-rent-payment/save',  [PaiRentPaymentController::class, 'save'])->name('pai.rent.save');

    Route::get('media/{media}', function (Media $media) {
        return response()->file($media->getPath());
    })->name('media.download');
});


require __DIR__.'/auth.php';
