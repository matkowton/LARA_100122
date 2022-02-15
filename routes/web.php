<?php

use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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

Route::get('/', function () {
    return view('welcome');
});

/**
 * Новости
 */
Route::group([
    'prefix' => 'news',
    'as' => 'news::'
], function() {

    Route::get('/', [NewsController::class, 'index'])
        ->name("categories");

    Route::get('/card/{news}', [NewsController::class, 'card'])
        ->where('news', '[0-9]+')
        ->name('card');

    Route::get('/{categoryId}', [NewsController::class, 'list'])
        ->where('categoryId', '[0-9]+')
        ->name('list');
});


Route::resource('admin/category', \App\Http\Controllers\Admin\CategoryController::class);


/**
 * Админка новостей
 */

$adminNewsRoutes = function () {
    Route::group([
        'prefix' => '/news',
        'as' => 'news::',
        //'middleware' => ['auth']
    ], function () {
        Route::get('/', [AdminNewsController::class, 'index'])
            ->name('index');

        Route::get('/create', [AdminNewsController::class, 'create'])
            ->name('create');

        Route::post('/save', [AdminNewsController::class, 'save'])
            ->name('save');

        Route::get('/update/{news}', [AdminNewsController::class, 'update'])
            ->where('news', '[0-9]+')
            ->name('update');

        Route::get('/delete/{id}', [AdminNewsController::class, 'delete'])
            ->where('id', '[0-9]+')
            ->name('delete');
    });
};

/**
 * Админка
 */
Route::group([
    'prefix' => 'admin/',
    'namespace' => '\App\Http\Controllers\Admin',
    'as' => 'admin::',
  //  'middleware' => ['auth', 'check_admin']
], function () use ($adminNewsRoutes) {
    $adminNewsRoutes();
    //Профиль
    Route::group([
        'prefix' => 'profile',
        'as' => 'profile::',
    ], function () {
        Route::post('update', 'ProfileController@update',
        )->name('update');

        Route::get('show', 'ProfileController@show',
        )->name('show');
    });

    //Parser
    Route::get("parser", [ParserController::class, 'index'])
        ->name('parser');
});



Route::get('/db', [\App\Http\Controllers\DbController::class, 'index']);

Route::get('/locale/{lang}', [\App\Http\Controllers\LocaleController::class, 'index'])
    ->where('lang', '\w+')
    ->name('locale');


Route::group([
    'prefix' => 'social',
    'as' => 'social::',
], function () {
    Route::get('/login', [SocialController::class, 'loginVk'])
        ->name('login-vk');
    Route::get('/response', [SocialController::class, 'responseVk'])
        ->name('response-vk');
});

/*
Route::match(['get', 'post'], '/test', function (){return '<b>hello, world!</b>'; });
Route::any( '/test', function (){return '<b>hello, world!</b>'; });
*/

/*
Route::get('', function (){});
Route::post('', function (){});
Route::put('', function (){});
Route::patch('', function (){});
Route::delete('', function (){});
Route::options('', function (){});
*/


Auth::routes(['register' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

