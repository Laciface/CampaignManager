<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

//main page
Route::get('/', [CampaignController::class, 'displayCampaigns'])->name('displayCampaigns');

//create product
Route::get('/productForm', [ProductController::class, 'displayProductForm'])->name('productForm');
Route::post('/createProduct', [ProductController::class, 'createProduct']);

//create campaign
Route::get('/campaignForm', [CampaignController::class, 'displayCampaignsForm'])->name('campaignForm');
Route::post('/createCampaign', [CampaignController::class, 'createCampaign']);

//create coupon
Route::get('/couponForm', [CouponController::class, 'displayCouponForm'])->name('couponForm');
Route::post('/createCoupon', [CouponController::class, 'createCoupon']);
