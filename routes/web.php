<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Category;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $users = User::all();
        return view('dashboard', compact('users'));
    })->name('dashboard');
});
Route::get('/category', function () {
    $categories = Category::latest('created_at')->get();
    $trashCat = Category::onlyTrashed('deleted_at')->get();
    return view('category', compact('categories', 'trashCat'));
})->name('category');
Route::get('/form', function () {
    return view('form');
})->name('form');

Route::get('/edit', function () {
    // $categories = Category::all();
    return view('edit');
})->name('edit');

Route::get('/CategoryController/edit{id}', [CategoryController::class, 'EditCat']);
Route::post('/CategoryController/update{id}', [CategoryController::class, 'UpdateCat']);
Route::post('/CategoryController/addcat', [CategoryController::class, 'addCategory']);
Route::get('/CategoryController/remove{id}', [CategoryController::class, 'RemoveCat']);
Route::get('/CategoryController/restore{id}', [CategoryController::class, 'RestoreCat']);
Route::get('/CategoryController/delete{id}', [CategoryController::class, 'DeleteCat']);


Route::get('brand/all', [BrandController::class, 'AllBrand'])->name('brand');
Route::post('brand/add', [BrandController::class, 'AddBrand'])->name('add.brand');