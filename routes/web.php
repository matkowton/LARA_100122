<?php

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

Route::get('/test', function () {
    return '<b>hello, world!</b>';
});

Route::get('/news', [\App\Http\Controllers\NewsController::class, 'index'])
    ->name("news::catalog");

Route::get('/news/card/{id}', [\App\Http\Controllers\NewsController::class, 'card'])
    ->where('id', '[0-9]+')
    ->name("news::card");

Route::resource('admin/category', \App\Http\Controllers\Admin\CategoryController::class);

/*
Route::get('/admin/news/', [\App\Http\Controllers\Admin\NewsController::class, 'index'])->name("admin::news::index");
Route::get('/admin/news/create', [\App\Http\Controllers\Admin\NewsController::class, 'create'])->name("admin::news::create");
Route::get('/admin/news/update', [\App\Http\Controllers\Admin\NewsController::class, 'update'])->name("admin::news::update");
Route::get('/admin/news/delete', [\App\Http\Controllers\Admin\NewsController::class, 'delete'])->name("admin::news::delete");
*/
/**
 * Админка новостей
 */

Route::group([
    'prefix' => '/admin/news',
    'as' => 'admin::news::'
], function () {
    Route::get('', [AdminNewsController::class, 'index'])
        ->name("index");

    Route::post('create', [AdminNewsController::class, 'create'])
        ->name("create");

    Route::get('new', [AdminNewsController::class, 'new'])
        ->name("new");

    Route::get('update', [AdminNewsController::class, 'update'])
        ->name("update");

    Route::get('delete', [AdminNewsController::class, 'delete'])
        ->name("delete");
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



