<?php

use App\Http\Controllers\BlogPostController;
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

//Campaign
Route::get('/campaignForm', [CampaignController::class, 'displayCampaignsForm'])->name('campaignForm');
Route::post('/createCampaign', [CampaignController::class, 'createCampaign']);
Route::get('/campaignHandler/{id}', [CampaignController::class, 'openHandler']);
Route::post('/changeStatus/{id}', [CampaignController::class, 'changeStatus']);

//Product
Route::get('/productForm', [ProductController::class, 'displayProductForm'])->name('productForm');
Route::post('/createProduct', [ProductController::class, 'createProduct']);
Route::post('/addProduct/{id}', [ProductController::class, 'addProductToCampaign']);
Route::get('/readProduct/{productId}', [ProductController::class, 'openProduct']);

//Coupon
Route::get('/couponForm', [CouponController::class, 'displayCouponForm'])->name('couponForm');
Route::post('/createCoupon', [CouponController::class, 'createCoupon']);
Route::post('/addCoupon/{id}', [CouponController::class, 'addCouponToCampaign']);
Route::post('/activateCoupon/{id}', [CouponController::class, 'activateCoupon']);

//Blog post
Route::get('/blogPostForm', [BlogPostController::class, 'displayBlogPostForm'])->name('blogPostForm');
Route::post('/createBlogPost', [BlogPostController::class, 'createPost']);
Route::post('/addPost/{id}', [blogPostController::class, 'addPostToCampaign']);
Route::get('/readPost/{postId}', [blogPostController::class, 'openPost']);

//start and stop campaign
Route::post('/activate/{id}', [CampaignController::class, 'startCampaign']);
Route::post('/stop/{id}', [CampaignController::class, 'stopCampaign']);
