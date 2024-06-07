<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\transactionController;

Route::get('/', function () {
    return view('welcome');
})-> name('welcome');
Route::post('vjf');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::view('/confirmation', 'confirmation')->name('confirmation');
Route::view('/finish', 'finish')->name('finish');
Route::post('/store_transaction', [transactionController::class, 'storetransactioninfo'])->name('store_transaction');
Route::post('/store_transaction2', [transactionController::class, 'storereceiverinfo'])->name('store_transaction2');
Route::get('/saving', [transactionController::class, 'savingdata'])->name('saving');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
