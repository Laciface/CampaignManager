<?php

use App\Http\Controllers\CampaignController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [CampaignController::class, 'displayCampaigns'])->name('displayCampaigns');

Route::get('/productForm', [ProductController::class, 'displayProductForm'])->name('productForm');
Route::get('/createCampaignPage', function () {
    return view('createCampaign');
})->name('campaignForm');


Route::post('/createCampaign', [CampaignController::class, 'createCampaign']);
Route::post('/createProduct', [ProductController::class, 'addProduct']);
