<?php

use App\Http\Controllers\Api\V1\Admin\CouponApiController;
use App\Http\Controllers\Api\V1\Admin\NewsletterApiController;
use App\Http\Controllers\Api\V1\Admin\OfferApiController;
use App\Http\Controllers\Api\V1\Admin\ProductApiController;
use App\Http\Controllers\Api\V1\Admin\PromotionApiController;
use App\Http\Controllers\Api\V1\Admin\PurchaseApiController;
use App\Http\Controllers\Api\V1\Admin\TemplateApiController;

Route::group(['prefix' => 'v1', 'as' => 'api.', 'middleware' => ['auth:sanctum']], function () {
    // Coupons
    Route::apiResource('coupons', CouponApiController::class);

    // Offers
    Route::apiResource('offers', OfferApiController::class);

    // Templates
    Route::apiResource('templates', TemplateApiController::class);

    // Newsletter
    Route::apiResource('newsletters', NewsletterApiController::class);

    // Promotions
    Route::apiResource('promotions', PromotionApiController::class);

    // Product
    Route::post('products/media', [ProductApiController::class, 'storeMedia'])->name('products.store_media');
    Route::apiResource('products', ProductApiController::class);

    // Purchases
    Route::apiResource('purchases', PurchaseApiController::class);
});
