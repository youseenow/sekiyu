<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;
use Illuminate\Support\Facades\Auth;
use App\Models\Book as BookModel;

class LoginController extends Controller
{


    // ==================== ▼▼▼ ログイン画面の表示 ▼▼▼ ====================
    public function view() {
        return view('login');
    }



    // ==================== ▼▼▼ ログイン情報 ▼▼▼ ====================
    public function login(LoginPostRequest $request) {
        // ---------- ▽▽▽ 入力値を受け取る ▽▽▽ ----------
        $datum = $request->validated();
        //var_dump($validatedData); exit;
        if (Auth::attempt($datum) === false) {
            return back()
                    ->withInput() // 入力値の保持
                    ->withErrors(['auth' => 'IDかパスワードに誤りがあります。']); // エラーメッセージの出力
        }
        $request->session()->regenerate();
        return redirect()->intended('/branch');
    }



    // ==================== ▼▼▼ ログイン完了（分岐画面の表示） ▼▼▼ ====================
    public function branch() {
        return view('branch');
    }



    // ==================== ▼▼▼ 分岐・新規渡航画面の表示 ▼▼▼ ====================
    public function form() {
        return view('form');
    }



    // ==================== ▼▼▼ 分岐・編集画面の表示 ▼▼▼ ====================
    public function edit() {
        // ---------- ▽▽▽ データベースのデータを取得 ▽▽▽ ----------
        $list = BookModel::orderBy('id', 'DESC')->paginate(20);

        // ---------- ▽▽▽ 編集一覧の表示 ▽▽▽ ----------
        return view('edit', ['list' => $list]);
    }



    // ==================== ▼▼▼ ログアウト ▼▼▼ ====================
    public function logout(Request $request) {
        Auth::logout();  // ログアウトの処理
        $request->session()->regenerateToken();  // CSRFトークンの再生成
        $request->session()->regenerate();  // セッションIDの再生成
        return redirect(route('login'));
    }



} /* LoginController */
