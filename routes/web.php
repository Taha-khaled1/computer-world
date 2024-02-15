<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\StripeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\up;
use App\Models\product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*
    1       >اجهزة الكمبيوتر<
    2       >مستلزمات الكمبيوتر<
    3       >طابعات<
    4       >منظومات كايمرات مراقبة<
    5       >اجهزة شبكات<
    6       >اجهزة عرض<
    7       >اجهزة ألعاب<
    8       >حقائب لابتوبات ماركة<

                                        --}}*/

Route::get('/', function () {

    $products =product::all();
        return view('welcome',["products"=>$products]);

});
Route::get('ser',[up::class,'create'])->name('ser');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('show_user',[up::class,'show_user'])->name('show_user');
Route::get('edite_user/{id}',[up::class,'edit'])->name('edite_user');

Route::get('product8' ,[ProductController::class,'view8'])->name('game');

Route::get('prof' ,[ProductController::class,'prof'])->name('prof');

Route::get('test' ,[ProductController::class,'index']);
Route::get('create_product' ,[ProductController::class,'create'])->name('create_product');
Route::get('show_product' ,[ProductController::class,'show'])->name('show_product');
Route::get('product1' ,[ProductController::class,'view1'])->name('computer');
Route::get('product2' ,[ProductController::class,'view2'])->name('computer_tool');
Route::get('product3' ,[ProductController::class,'view3'])->name('printer');
Route::get('product4' ,[ProductController::class,'view4'])->name('camera');
Route::get('product5' ,[ProductController::class,'view5'])->name('network');
Route::get('product6' ,[ProductController::class,'view6'])->name('bag');
Route::get('product7' ,[ProductController::class,'view7'])->name('projector');
Route::get('product8' ,[ProductController::class,'view8'])->name('game');

###############33
Route::get('cat1' ,[ProductController::class,'prod1'])->name('cat1');#projector
Route::get('cat2' ,[ProductController::class,'prod2'])->name('cat2');
Route::get('cat3' ,[ProductController::class,'prod3'])->name('cat3');
Route::get('cat4' ,[ProductController::class,'prod4'])->name('cat4');
Route::get('cat5' ,[ProductController::class,'prod5'])->name('cat5');
Route::get('cat6' ,[ProductController::class,'prod6'])->name('cat6');
Route::get('cat7' ,[ProductController::class,'prod7'])->name('cat7');
Route::get('cat8' ,[ProductController::class,'prod8'])->name('cat8');

#############3
Route::post('save_product' ,[ProductController::class,'store'])->name('save_product');

route::get('edit_product/{id}',[ProductController::class,'edit'])->name('edit_product');
route::post('udate_product/{id}',[ProductController::class,'update'])->name('update_product');
route::get('delete_pro/{id}',[ProductController::class,'destroy'])->name('delete_pro');
Route::get('delete/{id}',[up::class,'destroy'])->name('ds_user');
Route::post('update/{id}',[up::class,'update'])->name('update_user');


Route::get('zoz/{id}',[ProductController::class,'test'])->name('shoping');
Route::get('about',[up::class,'about'])->name('about');


Route::controller(PaymentController::class)
    ->prefix('paypal')
    ->group(function () {
        Route::view('payment', 'paypal.index')->name('create.payment');
        Route::get('handle-payment/{id}', 'handlePayment')->name('make.payment');
        Route::get('cancel-payment', 'paymentCancel')->name('cancel.payment');
        Route::get('payment-success', 'paymentSuccess')->name('success.payment');
    });
Route::get('search_pro',[ProductController::class,'search'])->name('search_pro');


Route::get('stripe/{id}', [StripeController::class, 'stripe']);
Route::post('stripe/{id}', [StripeController::class, 'stripePost'])->name('stripe.post');

require __DIR__.'/auth.php';
