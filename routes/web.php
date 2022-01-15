<?php

use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\NewsletterController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductTagController;
use App\Http\Controllers\Admin\PromotionController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SubscriptionController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TeamRoleController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\UserProfileController;
use App\Http\Controllers\Auth\UserTeamController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/login');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    // Permissions
    Route::resource('permissions', PermissionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Roles
    Route::resource('roles', RoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Users
    Route::resource('users', UserController::class, ['except' => ['store', 'update', 'destroy']]);

    // Team
    Route::post('teams/media', [TeamController::class, 'storeMedia'])->name('teams.storeMedia');
    Route::resource('teams', TeamController::class, ['except' => ['store', 'update', 'destroy']]);

    // Team Roles
    Route::resource('team-roles', TeamRoleController::class, ['except' => ['store', 'update', 'destroy']]);

    // Coupons
    Route::resource('coupons', CouponController::class, ['except' => ['store', 'update', 'destroy']]);

    // Offers
    Route::resource('offers', OfferController::class, ['except' => ['store', 'update', 'destroy']]);

    // Templates
    Route::resource('templates', TemplateController::class, ['except' => ['store', 'update', 'destroy']]);

    // Newsletter
    Route::resource('newsletters', NewsletterController::class, ['except' => ['store', 'update', 'destroy']]);

    // Promotions
    Route::resource('promotions', PromotionController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product Category
    Route::post('product-categories/media', [ProductCategoryController::class, 'storeMedia'])->name('product-categories.storeMedia');
    Route::resource('product-categories', ProductCategoryController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product Tag
    Route::resource('product-tags', ProductTagController::class, ['except' => ['store', 'update', 'destroy']]);

    // Product
    Route::post('products/media', [ProductController::class, 'storeMedia'])->name('products.storeMedia');
    Route::resource('products', ProductController::class, ['except' => ['store', 'update', 'destroy']]);

    // Purchases
    Route::resource('purchases', PurchaseController::class, ['except' => ['store', 'update', 'destroy']]);

    // Subscriptions
    Route::resource('subscriptions', SubscriptionController::class, ['except' => ['store', 'update', 'destroy']]);
});

Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserProfileController.php'))) {
        Route::get('/', [UserProfileController::class, 'show'])->name('show');
    }
});

Route::group(['prefix' => 'team', 'as' => 'team.', 'middleware' => ['auth']], function () {
    if (file_exists(app_path('Http/Controllers/Auth/UserTeamController.php'))) {
        Route::get('/', [UserTeamController::class, 'show'])->name('show');
        Route::get('{team}/accept', [UserTeamController::class, 'accept'])->middleware('signed')->name('accept');
    }
});
