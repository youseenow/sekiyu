<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BooksController;
use App\Http\Controllers\TopController;

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



// ==================== ▼▼▼ トップページ（テクノメンテ一覧ページ） ▼▼▼ ====================
Route::get('/', [TopController::class, 'index'])->name('index');



// ==================== ▼▼▼ ログイン ▼▼▼ ====================

// ---------- ▽▽▽ ログイン画面の表示 ▽▽▽ ----------
Route::get('/login', [LoginController::class, 'view'])->name('login');

// ---------- ▽▽▽ ログイン情報 ▽▽▽ ----------
Route::post('/login', [LoginController::class, 'login']);
Route::middleware(['auth'])->group(function () {
    // ----- ▽▽▽ 分岐画面への遷移 ▽▽▽ -----
    Route::get('/branch', [LoginController::class, 'branch']);
    // ----- ▽▽▽ 新規投稿フォームへの遷移 ▽▽▽ -----
    Route::get('/form', [LoginController::class, 'form']);
    // ----- ▽▽▽ 新規投稿処理 ▽▽▽ -----
    Route::post('/upload', [BooksController::class, 'upload']);
    // ----- ▽▽▽ 編集一覧画面への遷移 ▽▽▽ -----
    Route::get('/edit', [LoginController::class, 'edit']);
    // ----- ▽▽▽ 編集画面への遷移 ▽▽▽ -----
    Route::get('/edit/{id}', [BooksController::class, 'edit'])->whereNumber('id')->name('edit');
    // ----- ▽▽▽ 編集処理 ▽▽▽ -----
    Route::put('/edit/{id}', [BooksController::class, 'editSave'])->whereNumber('id')->name('edit_save');
    // ----- ▽▽▽ ログアウト ▽▽▽ -----
    Route::get('/logout', [LoginController::class, 'logout']);
});