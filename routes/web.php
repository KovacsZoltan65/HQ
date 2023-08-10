<?php

use App\Http\Controllers\BookController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return redirect()->back();
});

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    // ------------
    // BOOKS
    // ------------
    Route::post('/getBooks', [BookController::class, 'getBooks'])->name('getBooks');
    Route::resource('books', App\Http\Controllers\BookController::class)
        ->names([
            'index' => 'books',
            'store' => 'books_store',
            'update' => 'books_update',
            'delete' => 'books_delete',
        ]);
    
    // ------------
    // ROLES
    // ------------
    Route::post('/getRoles', [\App\Http\Controllers\Admin\RoleController::class, 'getRoles'])->name('getRoles');
    Route::resource('roles', \App\Http\Controllers\Admin\RoleController::class)
        ->names([
            'index' => 'roles',
            'store' => 'roles_store',
            'update' => 'roles_update',
            'delete' => 'roles_delete',
        ]);
});

Route::group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'admin', 'middleware' => ['auth']],
    function () {
        Route::resource('user', \App\Http\Controllers\Admin\UserController::class);
        Route::resource('role', \App\Http\Controllers\Admin\RoleController::class);
        Route::resource('permission', \App\Http\Controllers\Admin\PermissionController::class);
        Route::resource('post', \App\Http\Controllers\Admin\PostController::class);
    });
