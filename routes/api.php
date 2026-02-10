<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\BlogController;
use App\Http\Controllers\Api\V1\FaqController;
use App\Http\Controllers\Api\V1\ChangelogController;
use App\Http\Controllers\Api\V1\FeatureController;
use App\Http\Controllers\Api\V1\PageController;
use App\Http\Controllers\Api\V1\SettingController;
use App\Http\Controllers\Api\V1\AgentController;
use App\Http\Controllers\Api\V1\ServiceController;
use App\Http\Controllers\Api\V1\HomepageController;
use App\Http\Controllers\Api\V1\Admin\AdminBlogController;
use App\Http\Controllers\Api\V1\Admin\AdminFaqCategoryController;
use App\Http\Controllers\Api\V1\Admin\AdminFaqItemController;
use App\Http\Controllers\Api\V1\Admin\AdminChangelogVersionController;
use App\Http\Controllers\Api\V1\Admin\AdminChangelogItemController;
use App\Http\Controllers\Api\V1\Admin\AdminFeatureCategoryController;
use App\Http\Controllers\Api\V1\Admin\AdminFeatureItemController;
use App\Http\Controllers\Api\V1\Admin\AdminPageController;
use App\Http\Controllers\Api\V1\Admin\AdminSettingController;
use App\Http\Controllers\Api\V1\Admin\AdminAgentController;
use App\Http\Controllers\Api\V1\Admin\AdminServiceController;
use App\Http\Controllers\Api\V1\Admin\AdminHomepageSectionController;
use App\Http\Controllers\Api\V1\Admin\AdminTrustIndicatorController;
use App\Http\Controllers\Api\V1\Admin\AdminServiceHighlightController;
use App\Http\Controllers\Api\V1\Admin\UploadController;

// Auth
Route::post('/auth/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::post('/auth/logout', [AuthController::class, 'logout']);
    Route::post('/auth/refresh', [AuthController::class, 'refresh']);
    Route::get('/auth/me', [AuthController::class, 'me']);
});

// Public endpoints
Route::middleware('throttle:60,1')->group(function () {
    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/{slug}', [BlogController::class, 'show']);
    Route::get('/faq', [FaqController::class, 'index']);
    Route::get('/changelog', [ChangelogController::class, 'index']);
    Route::get('/features', [FeatureController::class, 'index']);
    Route::get('/features/{slug}', [FeatureController::class, 'show']);
    Route::get('/pages/{slug}', [PageController::class, 'show']);
    Route::get('/settings/{group}', [SettingController::class, 'show']);
    Route::get('/agents', [AgentController::class, 'index']);
    Route::get('/services', [ServiceController::class, 'index']);
    Route::get('/homepage', [HomepageController::class, 'index']);
});

// Admin CRUD endpoints (JWT + permission per action)
Route::middleware('auth:api')->prefix('admin')->group(function () {
    $resources = [
        'blog'                => ['controller' => AdminBlogController::class,              'permission' => 'blog'],
        'faq-categories'      => ['controller' => AdminFaqCategoryController::class,       'permission' => 'faq'],
        'faq-items'           => ['controller' => AdminFaqItemController::class,            'permission' => 'faq'],
        'changelog-versions'  => ['controller' => AdminChangelogVersionController::class,   'permission' => 'changelog'],
        'changelog-items'     => ['controller' => AdminChangelogItemController::class,      'permission' => 'changelog'],
        'feature-categories'  => ['controller' => AdminFeatureCategoryController::class,    'permission' => 'feature'],
        'feature-items'       => ['controller' => AdminFeatureItemController::class,        'permission' => 'feature'],
        'pages'               => ['controller' => AdminPageController::class,               'permission' => 'page'],
        'settings'            => ['controller' => AdminSettingController::class,            'permission' => 'setting'],
        'agents'              => ['controller' => AdminAgentController::class,              'permission' => 'agent'],
        'services'            => ['controller' => AdminServiceController::class,            'permission' => 'service'],
        'homepage-sections'   => ['controller' => AdminHomepageSectionController::class,    'permission' => 'homepage'],
        'trust-indicators'    => ['controller' => AdminTrustIndicatorController::class,     'permission' => 'trust-indicator'],
        'service-highlights'  => ['controller' => AdminServiceHighlightController::class,   'permission' => 'service-highlight'],
    ];

    foreach ($resources as $name => $config) {
        $ctrl = $config['controller'];
        $p = $config['permission'];

        Route::middleware("permission:{$p}.view")->group(function () use ($name, $ctrl) {
            Route::get($name, [$ctrl, 'index'])->name("{$name}.index");
            Route::get("{$name}/{id}", [$ctrl, 'show'])->name("{$name}.show");
        });

        Route::post($name, [$ctrl, 'store'])
            ->middleware("permission:{$p}.create")
            ->name("{$name}.store");

        Route::put("{$name}/{id}", [$ctrl, 'update'])
            ->middleware("permission:{$p}.update")
            ->name("{$name}.update");

        Route::delete("{$name}/{id}", [$ctrl, 'destroy'])
            ->middleware("permission:{$p}.delete")
            ->name("{$name}.delete");
    }

    Route::post('/upload', [UploadController::class, 'store'])->middleware('permission:upload.create');
});
