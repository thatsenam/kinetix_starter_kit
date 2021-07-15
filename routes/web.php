<?php

use App\Http\Controllers\AssetCategoriesController;
use App\Http\Controllers\BuySmsController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\IVAsController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SmsContactsController;
use App\Http\Controllers\SMSModelsController;
use App\Http\Controllers\SmsTemplatesController;
use App\Http\Controllers\StudentsController;
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

Route::get('/', 'PagesController@index');


// Demo routes
Route::get('/datatables', 'PagesController@datatables');
Route::get('/ktdatatables', 'PagesController@ktDatatables');
Route::get('/select2', 'PagesController@select2');
Route::get('/test', 'PagesController@test');
Route::get('/jquerymask', 'PagesController@jQueryMask');
Route::get('/icons/custom-icons', 'PagesController@customIcons');
Route::get('/icons/flaticon', 'PagesController@flaticon');
Route::get('/icons/fontawesome', 'PagesController@fontawesome');
Route::get('/icons/lineawesome', 'PagesController@lineawesome');
Route::get('/icons/socicons', 'PagesController@socicons');
Route::get('/icons/svg', 'PagesController@svg');

// Quick search dummy route to display html elements in search dropdown (header search)
Route::get('/quick-search', 'PagesController@quickSearch')->name('quick-search');


Route::group([
    'prefix' => 'asset_categories',
], function () {

    Route::get('/', [AssetCategoriesController::class, 'index'])->name('asset_categories.asset_category.index');
    Route::get('/create', [AssetCategoriesController::class, 'create'])->name('asset_categories.asset_category.create');
    Route::get('/show/{assetCategory}', [AssetCategoriesController::class, 'show'])->name('asset_categories.asset_category.show')->where('id', '[0-9]+');
    Route::get('/{assetCategory}/edit', [AssetCategoriesController::class, 'edit'])->name('asset_categories.asset_category.edit')->where('id', '[0-9]+');
    Route::post('/', [AssetCategoriesController::class, 'store'])->name('asset_categories.asset_category.store');
    Route::put('asset_category/{assetCategory}', [AssetCategoriesController::class, 'update'])->name('asset_categories.asset_category.update')->where('id', '[0-9]+');
    Route::delete('/asset_category/{assetCategory}', [AssetCategoriesController::class, 'destroy'])->name('asset_categories.asset_category.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'categories',
], function () {

    Route::get('/', [CategoriesController::class, 'index'])->name('categories.category.index');
    Route::get('/create', [CategoriesController::class, 'create'])->name('categories.category.create');
    Route::get('/show/{category}', [CategoriesController::class, 'show'])->name('categories.category.show')->where('id', '[0-9]+');
    Route::get('/{category}/edit', [CategoriesController::class, 'edit'])->name('categories.category.edit')->where('id', '[0-9]+');
    Route::post('/', [CategoriesController::class, 'store'])->name('categories.category.store');
    Route::put('category/{category}', [CategoriesController::class, 'update'])->name('categories.category.update')->where('id', '[0-9]+');
    Route::delete('/category/{category}', [CategoriesController::class, 'destroy'])->name('categories.category.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'posts',
], function () {

    Route::get('/', [PostsController::class, 'index'])->name('posts.post.index');
    Route::get('/trash', [PostsController::class, 'trash'])->name('posts.post.trash');
    Route::get('/create', [PostsController::class, 'create'])->name('posts.post.create');
    Route::get('/show/{post}', [PostsController::class, 'show'])->name('posts.post.show')->where('id', '[0-9]+');
    Route::get('/{post}/edit', [PostsController::class, 'edit'])->name('posts.post.edit')->where('id', '[0-9]+');
    Route::post('/', [PostsController::class, 'store'])->name('posts.post.store');
    Route::put('post/{post}', [PostsController::class, 'update'])->name('posts.post.update')->where('id', '[0-9]+');
    Route::delete('/post/{post}', [PostsController::class, 'destroy'])->name('posts.post.destroy')->where('id', '[0-9]+');
    Route::post('/post/{post}', [PostsController::class, 'restore'])->name('posts.post.restore')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'sms_templates',
], function () {

    Route::get('/', [SmsTemplatesController::class, 'index'])->name('sms_templates.sms_template.index');
    Route::get('/create', [SmsTemplatesController::class, 'create'])->name('sms_templates.sms_template.create');
    Route::get('/show/{smsTemplate}', [SmsTemplatesController::class, 'show'])->name('sms_templates.sms_template.show')->where('id', '[0-9]+');
    Route::get('/{smsTemplate}/edit', [SmsTemplatesController::class, 'edit'])->name('sms_templates.sms_template.edit')->where('id', '[0-9]+');
    Route::post('/', [SmsTemplatesController::class, 'store'])->name('sms_templates.sms_template.store');
    Route::put('sms_template/{smsTemplate}', [SmsTemplatesController::class, 'update'])->name('sms_templates.sms_template.update')->where('id', '[0-9]+');
    Route::delete('/sms_template/{smsTemplate}', [SmsTemplatesController::class, 'destroy'])->name('sms_templates.sms_template.destroy')->where('id', '[0-9]+');

});


Route::group([
    'prefix' => 'sms_contacts',
], function () {
    Route::get('/', [SmsContactsController::class, 'index'])->name('sms_contacts.sms_contact.index');
    Route::get('/create', [SmsContactsController::class, 'create'])->name('sms_contacts.sms_contact.create');
    Route::get('/show/{smsContact}', [SmsContactsController::class, 'show'])->name('sms_contacts.sms_contact.show')->where('id', '[0-9]+');
    Route::get('/{smsContact}/edit', [SmsContactsController::class, 'edit'])->name('sms_contacts.sms_contact.edit')->where('id', '[0-9]+');
    Route::post('/', [SmsContactsController::class, 'store'])->name('sms_contacts.sms_contact.store');
    Route::put('sms_contact/{smsContact}', [SmsContactsController::class, 'update'])->name('sms_contacts.sms_contact.update')->where('id', '[0-9]+');
    Route::delete('/sms_contact/{smsContact}', [SmsContactsController::class, 'destroy'])->name('sms_contacts.sms_contact.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 's_m_s_models',
], function () {

    Route::get('/', [SMSModelsController::class, 'index'])->name('s_m_s_models.s_m_s_model.index');
    Route::get('/create', [SMSModelsController::class, 'create'])->name('s_m_s_models.s_m_s_model.create');
    Route::get('/show/{sMSModel}', [SMSModelsController::class, 'show'])->name('s_m_s_models.s_m_s_model.show')->where('id', '[0-9]+');
    Route::get('/{sMSModel}/edit', [SMSModelsController::class, 'edit'])->name('s_m_s_models.s_m_s_model.edit')->where('id', '[0-9]+');
    Route::post('/', [SMSModelsController::class, 'store'])->name('s_m_s_models.s_m_s_model.store');
    Route::put('s_m_s_model/{sMSModel}', [SMSModelsController::class, 'update'])->name('s_m_s_models.s_m_s_model.update')->where('id', '[0-9]+');
    Route::delete('/s_m_s_model/{sMSModel}', [SMSModelsController::class, 'destroy'])->name('s_m_s_models.s_m_s_model.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'buy_sms',
], function () {

    Route::get('/', [BuySmsController::class, 'index'])->name('buy_sms.buy_sms.index');
    Route::get('/create', [BuySmsController::class, 'create'])->name('buy_sms.buy_sms.create');
    Route::get('/show/{buySms}', [BuySmsController::class, 'show'])->name('buy_sms.buy_sms.show')->where('id', '[0-9]+');
    Route::get('/{buySms}/edit', [BuySmsController::class, 'edit'])->name('buy_sms.buy_sms.edit')->where('id', '[0-9]+');
    Route::post('/', [BuySmsController::class, 'store'])->name('buy_sms.buy_sms.store');
    Route::put('buy_sms/{buySms}', [BuySmsController::class, 'update'])->name('buy_sms.buy_sms.update')->where('id', '[0-9]+');
    Route::delete('/buy_sms/{buySms}', [BuySmsController::class, 'destroy'])->name('buy_sms.buy_sms.destroy')->where('id', '[0-9]+');

});


Route::group([
    'prefix' => 'students',
], function () {

    Route::get('/', [StudentsController::class, 'index'])->name('students.student.index');
    Route::get('/create', [StudentsController::class, 'create'])->name('students.student.create');
    Route::get('/show/{student}', [StudentsController::class, 'show'])->name('students.student.show')->where('id', '[0-9]+');
    Route::get('/{student}/edit', [StudentsController::class, 'edit'])->name('students.student.edit')->where('id', '[0-9]+');
    Route::post('/', [StudentsController::class, 'store'])->name('students.student.store');
    Route::put('student/{student}', [StudentsController::class, 'update'])->name('students.student.update')->where('id', '[0-9]+');
    Route::delete('/student/{student}', [StudentsController::class, 'destroy'])->name('students.student.destroy')->where('id', '[0-9]+');

});

Route::group([
    'prefix' => 'i_v_as',
], function () {

    Route::get('/', [IVAsController::class, 'index'])->name('i_v_as.i_v_a.index');
    Route::get('/create', [IVAsController::class, 'create'])->name('i_v_as.i_v_a.create');
    Route::get('/show/{iVA}', [IVAsController::class, 'show'])->name('i_v_as.i_v_a.show')->where('id', '[0-9]+');
    Route::get('/{iVA}/edit', [IVAsController::class, 'edit'])->name('i_v_as.i_v_a.edit')->where('id', '[0-9]+');
    Route::post('/', [IVAsController::class, 'store'])->name('i_v_as.i_v_a.store');
    Route::put('i_v_a/{iVA}', [IVAsController::class, 'update'])->name('i_v_as.i_v_a.update')->where('id', '[0-9]+');
    Route::delete('/i_v_a/{iVA}', [IVAsController::class, 'destroy'])->name('i_v_as.i_v_a.destroy')->where('id', '[0-9]+');

});


//Route::namespace('')->resource('people', PersonController::class);
Route::get('people', [PersonController::class, 'index'])->name('people.index');
Route::get('people/create', [PersonController::class, 'create'])->name('people.create');
Route::post('people', [PersonController::class, 'store'])->name('people.store');
Route::get('people/{id}/edit', [PersonController::class, 'edit'])->name('people.edit');
Route::get('people/{id}/show', [PersonController::class, 'show'])->name('people.show');
Route::patch('people/{id}/update', [PersonController::class, 'update'])->name('people.update');
Route::delete('people/{id}/delete', [PersonController::class, 'destroy'])->name('people.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
