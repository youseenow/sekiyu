<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book as BookModel;

class TopController extends Controller
{
    // ==================== ▼▼▼ トップページの表示 ▼▼▼ ====================
    public function index() {

        // ---------- ▽▽▽ データベースのデータを取得 ▽▽▽ ----------
        $list = BookModel::orderBy('id', 'DESC')->paginate(5);
        //$sql = BookModel::toSql(); // 確認用の記述
        //echo "<pre>\n"; var_dump($sql, $list); exit; // 確認用の記述

        // ---------- ▽▽▽ トップページの表示 ▽▽▽ ----------
        return view('index', ['list' => $list]);
    }
}
