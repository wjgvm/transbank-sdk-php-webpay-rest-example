<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OneclickController;
use App\Http\Controllers\OneclickDeferredController;
use App\Http\Controllers\PatpassComercioController;
use App\Http\Controllers\TransaccionCompletaController;
use App\Http\Controllers\TransaccionCompletaDeferredController;
use App\Http\Controllers\TransaccionCompletaMallController;
use App\Http\Controllers\WebpayPlusController;
use App\Http\Controllers\WebpayPlusDeferredController;
use App\Http\Controllers\WebpayPlusMallController;
use App\Http\Controllers\WebpayPlusMallDeferredController;
use App\Http\Controllers\WebpayPlusMallDuesQrController;
use App\Http\Controllers\WebpayPlusMallQrController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class,'welcome']);

# Webpay Plus
Route::get('/webpayplus/create', function () {
    return view('webpayplus/create');
});

Route::post('/webpayplus/create/', [WebpayPlusController::class,'createdTransaction']);

Route::any('/webpayplus/returnUrl', [WebpayPlusController::class,'commitTransaction']);

Route::get('/webpayplus/refund', [WebpayPlusController::class,'showRefund']);
Route::post('/webpayplus/refund', [WebpayPlusController::class,'refundTransaction']);

Route::get('/webpayplus/transactionStatus', [WebpayPlusController::class,'showGetStatus']);
Route::post('/webpayplus/transactionStatus', [WebpayPlusController::class,'getTransactionStatus']);

# Webpay Plus Diferido
Route::get('/webpayplus/diferido/create', function () {
    return view('webpayplus/diferido/create');
});
Route::post('/webpayplus/diferido/create', [WebpayPlusDeferredController::class,'createDiferido']);

Route::any('/webpayplus/diferido/returnUrl', [WebpayPlusDeferredController::class,'commitDiferidoTransaction']);

Route::get('/webpayplus/diferido/capture', function () {
    return view('webpayplus/diferido/diferido');
});
Route::post('/webpayplus/diferido/capture', [WebpayPlusDeferredController::class,'captureDiferido']);


Route::get('/webpayplus/diferido/refund', function () {
    return view('webpayplus/diferido/refund');
});
Route::post('/webpayplus/diferido/refund', [WebpayPlusDeferredController::class,'refundDiferido']);

Route::post('/webpayplus/diferido/status', [WebpayPlusDeferredController::class,'statusDiferido']);




# Webpay Plus Mall

Route::get('/webpayplus/createMall', [WebpayPlusMallController::class,'createMall']);
Route::post('/webpayplus/createMall', [WebpayPlusMallController::class,'createdMallTransaction']);

Route::any('/webpayplus/mallReturnUrl', [WebpayPlusMallController::class,'commitMallTransaction']);

Route::get('/webpayplus/mallRefund', [WebpayPlusMallController::class,'showMallRefund']);
Route::post('/webpayplus/mallRefund', [WebpayPlusMallController::class,'refundMallTransaction']);
Route::post('/webpayplus/mallTransactionStatus', [WebpayPlusMallController::class,'getMallTransactionStatus']);

# Webpay Plus Cuotas QR

Route::get('/webpayplusduesqr/createMall', [WebpayPlusMallDuesQrController::class,'createMall']);
Route::post('/webpayplusduesqr/createMall', [WebpayPlusMallDuesQrController::class,'createdMallTransaction']);

Route::any('/webpayplusduesqr/mallReturnUrl', [WebpayPlusMallDuesQrController::class,'commitMallTransaction'])->name('webpayplusduesqr.commit');

Route::get('/webpayplusduesqr/mallRefund', [WebpayPlusMallDuesQrController::class,'showMallRefund']);
Route::post('/webpayplusduesqr/mallRefund', [WebpayPlusMallDuesQrController::class,'refundMallTransaction']);
Route::post('/webpayplusduesqr/mallTransactionStatus', [WebpayPlusMallDuesQrController::class,'getMallTransactionStatus']);

# Webpay Plus Mall QR

Route::get('/webpayplusqr/createMall', [WebpayPlusMallQrController::class, 'createMall']);
Route::post('/webpayplusqr/createMall', [WebpayPlusMallQrController::class, 'createdMallTransaction']);

Route::any('/webpayplusqr/mallReturnUrl', [WebpayPlusMallQrController::class, 'commitMallTransaction']);

Route::get('/webpayplusqr/mallRefund', [WebpayPlusMallQrController::class, 'showMallRefund']);
Route::post('/webpayplusqr/mallRefund', [WebpayPlusMallQrController::class, 'refundMallTransaction']);
Route::post('/webpayplusqr/mallTransactionStatus', [WebpayPlusMallQrController::class, 'getMallTransactionStatus']);


# Transaccion Completa
Route::get('/transaccion_completa/create', function () {
    return view('transaccion_completa/create');
});

Route::post('/transaccion_completa/create', [TransaccionCompletaController::class, 'createTransaction']);

Route::post('/transaccion_completa/installments', [TransaccionCompletaController::class, 'installments']);

Route::get('/transaccion_completa/transaction_commit', function () {
    return view('transaccion_completa/transaction_commit');
});

Route::post('/transaccion_completa/transaction_commit', [TransaccionCompletaController::class, 'commit']);

Route::get('/transaccion_completa/transaction_status', function () {
    return view('transaccion_completa/transaction_status');
});

Route::post('/transaccion_completa/transaction_status', [TransaccionCompletaController::class, 'status']);

Route::post('/transaccion_completa/refund', [TransaccionCompletaController::class, 'refund']);

# Transacción completa diferido.
Route::get('/transaccion_completa/diferido/create', function () {
    return view('transaccion_completa/diferido/create');
})->name("completa.diferido.index");

Route::post('/transaccion_completa/diferido/create', [TransaccionCompletaDeferredController::class, 'createTransaction'])->name("completa.deferred.create");

Route::post('/transaccion_completa/diferido/installments', [TransaccionCompletaDeferredController::class, 'installments'])->name("completa.deferred.installments");

Route::post('/transaccion_completa/diferido/commit', [TransaccionCompletaDeferredController::class, 'commit'])->name("completa.deferred.commit");

Route::post('/transaccion_completa/diferido/capture', [TransaccionCompletaDeferredController::class, 'capture'])->name("completa.deferred.capture");

Route::post('/transaccion_completa/diferido/transaction_status', [TransaccionCompletaDeferredController::class, 'status'])->name("completa.deferred.status");

Route::post('/transaccion_completa/diferido/refund', [TransaccionCompletaDeferredController::class, 'refund'])->name("completa.deferred.refund");


# Transaccion completa mall
Route::get('/transaccion_completa/mall_create', [TransaccionCompletaMallController::class, 'showMallCreate']);


Route::post('/transaccion_completa/mall_create', [TransaccionCompletaMallController::class, 'mallCreate']);

Route::post('/transaccion_completa/mall_installments', [TransaccionCompletaMallController::class, 'mallInstallments']);

Route::get('/transaccion_completa/mall_commit', function () {
    return view('transaccion_completa/mall_commit');
});

Route::post('/transaccion_completa/mall_commit', [TransaccionCompletaMallController::class, 'mallCommit']);

Route::get('/transaccion_completa/mall_status/{token}', [TransaccionCompletaMallController::class, 'mallStatus']);

Route::post('/transaccion_completa/mall_refund', [TransaccionCompletaMallController::class, 'mallRefund']);

# Patpass comercio

Route::get('/patpass_comercio/create-form', function () {

    return view('patpass_comercio/create_form');
});
Route::post('/patpass_comercio/create-form/', [PatpassComercioController::class, 'startTransaction']);
Route::post('/patpass_comercio/returnUrl', [PatpassComercioController::class, 'finishStartTransaction']);
Route::post('/patpass_comercio/status', [PatpassComercioController::class, 'status']);
Route::post('/patpass_comercio/voucherUrl', [PatpassComercioController::class, 'displayVoucher']);


# Webpay Plus Mall diferido
Route::get('/webpayplus/mall/diferido/create', function () {
    return view('webpayplus/mall/diferido/create');
});
Route::post('/webpayplus/mall/diferido/create', [WebpayPlusMallDeferredController::class, 'createMallDiferido']);

Route::any('/webpayplus/mall/diferido/returnUrl', [WebpayPlusMallDeferredController::class, 'commitMallDiferido']);

Route::get('/webpayplus/mall/diferido/capture', function () {
    return view('webpayplus/mall/diferido/capture');
});
Route::post('/webpayplus/mall/diferido/capture', [WebpayPlusMallDeferredController::class, 'captureMallDiferido']);


Route::get('/webpayplus/mall/diferido/refund', function () {
    return view('webpayplus/mall/diferido/refund');
});
Route::post('/webpayplus/mall/diferido/refund', [WebpayPlusMallDeferredController::class, 'refundMallDiferido']);

Route::post('/webpayplus/mall/diferido/transactionStatus', [WebpayPlusMallDeferredController::class, 'statusMallDiferido']);

# Oneclick Mall

Route::get('/oneclick/startInscription', function() {
    return view('oneclick/start_inscription');
});
Route::post('/oneclick/startInscription', [OneclickController::class, 'startInscription']);

Route::delete('/oneclick/inscription', [OneclickController::class, 'deleteInscription']);
Route::get('/oneclick/inscription', [OneclickController::class, 'deleteInscription']);

Route::any('/oneclick/responseUrl', [OneclickController::class, 'finishInscription']);

Route::get('/oneclick/mall/authorizeTransaction', function () {

    return view('/oneclick/authorize_mall');

});
Route::post('/oneclick/mall/authorizeTransaction', [OneclickController::class, 'authorizeMall']);

Route::post('/oneclick/mall/transactionStatus', [OneclickController::class, 'transactionStatus']);

Route::post('/oneclick/mall/refund', [OneclickController::class, 'refund']);


# Oneclick Mall diferido

Route::get('/oneclick/diferido/startInscription', function() {
    return view('oneclick/mall_diferido/start_inscription');
});
Route::post('/oneclick/diferido/startInscription', [OneclickDeferredController::class, 'startInscription']);

Route::delete('/oneclick/diferido/inscription', [OneclickDeferredController::class, 'deleteInscription']);
Route::get('/oneclick/diferido/inscription', [OneclickDeferredController::class, 'deleteInscription']);

Route::any('/oneclick/diferido/responseUrl', [OneclickDeferredController::class, 'finishInscription']);

Route::get('/oneclick/mall/diferido/authorizeTransaction', function () {
    return view('/oneclick/diferido/authorize_mall');
});
Route::post('/oneclick/mall/diferido/authorizeTransaction', [OneclickDeferredController::class, 'authorizeMall']);

Route::post('/oneclick/mall/diferido/transaction_status', [OneclickDeferredController::class, 'transactionStatus']);

Route::post('/oneclick/mall/diferido/refund', [OneclickDeferredController::class, 'refund']);

Route::post('/oneclick/mall/diferido/capture', [OneclickDeferredController::class, 'transactionCapture']);
