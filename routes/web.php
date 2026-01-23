<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PricingPlanController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{

    Route::get('/', [HomeController::class, 'home'])->name('home');
    // Route::get('/email-test', [ContactController::class, 'test']);
    Route::get('/property/{id}', [PropertyController::class, 'single'])->name('single-property');
    Route::get('/properties/', [PropertyController::class, 'properties'])->name('properties');
    Route::get('/page/{slug}', [PageController::class, 'single'])->name('page');
    Route::post('/property-inquiry/{id}', [ContactController::class, 'propertyInquiry'])->name('property-inquiry');


    Route::get('/categories/', [CategoryController::class, 'categories'])->name('categories');
    Route::get('/pricing/', [PricingPlanController::class, 'pricing_plan'])->name('pricing');
    Route::get('/contact/', [ContactController::class, 'contact_us'])->name('contact');
    Route::post('/contact-submit/', [ContactController::class, 'contactFormSubmit'])->name('contact-submit');

    Route::get('/currency/{code}', [HomeController::class, 'currencyChange'])->name('currency-change');
});


// admin routes

Route::middleware(['auth'])->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard-index');
    Route::get('/dashboard-properties', [DashboardController::class, 'properties'])->name('dashboard-properties');
    Route::get('/dashboard/add-property', [DashboardController::class, 'addProperty'])->name('add-property');
    Route::post('/dashboard/create-property', [DashboardController::class, 'createProperty'])->name('create-property');
    Route::post('/dashboard/update-property/{id}', [DashboardController::class, 'updteProperty'])->name('update-property');

    Route::get('/dashboard/edit-property/{id}', [DashboardController::class, 'editProperty'])->name('edit-property');
    Route::post('/dashboard/delete-property/{id}', [DashboardController::class, 'deleteProperty'])->name('delete-property');


    Route::post('/dashboard/delete-media/{media_id}', [DashboardController::class, 'deleteMedia'])->name('delete-media');

    Route::get('/dashboard-categories', [DashboardController::class, 'categories'])->name('dashboard-categories');
    Route::get('/dashboard/add-category', [DashboardController::class, 'addCategory'])->name('add-category');
    Route::post('/dashboard/create-category', [DashboardController::class, 'createCategory'])->name('create-category');
    Route::get('/dashboard/edit-category/{id}', [DashboardController::class, 'editCategory'])->name('edit-category');
    Route::post('/dashboard/update-category/{id}', [DashboardController::class, 'updteCategory'])->name('update-category');
    Route::post('/dashboard/delete-category/{id}', [DashboardController::class, 'deleteCategory'])->name('delete-category');

    Route::get('/dashboard-locations', [DashboardController::class, 'locations'])->name('dashboard-locations');
    Route::get('/dashboard/add-location', [DashboardController::class, 'addLocation'])->name('add-location');
    Route::post('/dashboard/create-location', [DashboardController::class, 'createLocation'])->name('create-location');
    Route::get('/dashboard/edit-location/{id}', [DashboardController::class, 'editLocation'])->name('edit-location');
    Route::post('/dashboard/update-location/{id}', [DashboardController::class, 'updteLocation'])->name('update-location');
    Route::post('/dashboard/delete-location/{id}', [DashboardController::class, 'deleteLocation'])->name('delete-location');


    Route::get('/dashboard-pricingplan', [DashboardController::class, 'pricing'])->name('dashboard-pricingplan');
    Route::get('/dashboard/add-pricing', [DashboardController::class, 'addPricing'])->name('add-pricing');
    Route::post('/dashboard/create-pricing', [DashboardController::class, 'createPricing'])->name('create-pricing');
    Route::get('/dashboard/edit-pricing/{id}', [DashboardController::class, 'editPricing'])->name('edit-pricing');
    Route::post('/dashboard/update-pricing/{id}', [DashboardController::class, 'updtePricing'])->name('update-pricing');
    Route::post('/dashboard/delete-pricing/{id}', [DashboardController::class, 'deletePricing'])->name('delete-pricing');


    Route::get('/dashboard-testimonials', [DashboardController::class, 'testimonials'])->name('dashboard-testimonials');
    Route::get('/dashboard/add-testimonial', [DashboardController::class, 'addTestimonial'])->name('add-testimonial');
    Route::post('/dashboard/create-testimonial', [DashboardController::class, 'createTestimonial'])->name('create-testimonial');
    Route::get('/dashboard/edit-testimonial/{id}', [DashboardController::class, 'editTestimonial'])->name('edit-testimonial');
    Route::post('/dashboard/update-testimonial/{id}', [DashboardController::class, 'updteTestimonial'])->name('update-testimonial');
    Route::post('/dashboard/delete-testimonial/{id}', [DashboardController::class, 'deleteTestimonial'])->name('delete-testimonial');

    Route::get('/dashboard-pages', [DashboardController::class, 'pages'])->name('dashboard-pages');
    Route::get('/dashboard/add-page', [DashboardController::class, 'addPage'])->name('add-page');
    Route::post('/dashboard/create-page', [DashboardController::class, 'createPage'])->name('create-page');
    Route::get('/dashboard/edit-page/{id}', [DashboardController::class, 'editPage'])->name('edit-page');
    Route::post('/dashboard/update-page/{id}', [DashboardController::class, 'updtePage'])->name('update-page');
    Route::post('/dashboard/delete-page/{id}', [DashboardController::class, 'deletePage'])->name('delete-page');

    Route::get('/dashboard-users', [DashboardController::class, 'users'])->name('dashboard-users');
    Route::get('/dashboard-messages', [DashboardController::class, 'messages'])->name('dashboard-messages');
    Route::post('/delete-message/{id}', [DashboardController::class, 'deleteMessages'])->name('delete-message');


});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
