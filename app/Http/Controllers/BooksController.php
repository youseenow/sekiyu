<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRegisterPostRequest;
use App\Models\Book as BookModel;


class BooksController extends Controller
{

    // ==================== ▼▼▼ サムネ・PDFアップ用共通メソッド ▼▼▼ ====================
    public function imageUpload(BookRegisterPostRequest $request) {}



    // ==================== ▼▼▼ テクノメンテのアップロード ▼▼▼ ====================
    public function upload(BookRegisterPostRequest $request) {

        // ---------- ▽▽▽ バリデーション済データの取得 ▽▽▽ ----------
        $datum = $request->validated();


        // ---------- ▽▽▽ サムネイル画像を保存するディレクトリ ▽▽▽ ----------
        $thum_dir = 'thumbnail';
        // ---------- ▽▽▽ サムネイル画像のファイル名取得 ▽▽▽ ----------
        $thum_file_name = $request->file('thumbnail')->getClientOriginalName();
        // ---------- ▽▽▽ サムネイル画像をthumbnailディレクトリに保存 ▽▽▽ ----------
        $request->file('thumbnail')->storeAs('public/' . $thum_dir, $thum_file_name);
        // ---------- ▽▽▽ ファイルのパスをDBに保存 ▽▽▽ ----------
        $datum['thumbnail'] = 'storage/' . $thum_dir . '/' . $thum_file_name;


        // ---------- ▽▽▽ PDFを保存するディレクトリ ▽▽▽ ----------
        $pdf_dir = 'pdf';
        // ---------- ▽▽▽ PDFのファイル名取得 ▽▽▽ ----------
        $pdf_file_name = $request->file('pdf')->getClientOriginalName();
        // ---------- ▽▽▽ PDFをpdfディレクトリに保存 ▽▽▽ ----------
        $request->file('pdf')->storeAs('public/' . $pdf_dir, $pdf_file_name);
        // ---------- ▽▽▽ ファイルのパスをDBに保存 ▽▽▽ ----------
        $datum['pdf'] = 'storage/' . $pdf_dir . '/' . $pdf_file_name;


        // ---------- ▽▽▽ booksテーブルにインサート ▽▽▽ ----------
        $r = BookModel::create($datum);
        //var_dump($r); exit;

        // ---------- ▽▽▽ 登録完了メッセージの表示 ▽▽▽ ----------
        $request->session()->flash('books_register_success', true);

        // ---------- ▽▽▽ 元のページに戻る ▽▽▽ ----------
        return redirect('/form');

    } /* upload */



    // ==================== ▼▼▼ テクノメンテの編集画面▼▼▼ ====================
    public function edit($id) {

        // ---------- ▽▽▽ レコードを取得する ▽▽▽ ----------
        $id = BookModel::find($id);
        //var_dump($id);
        if ($id === null) {
            return redirect('/edit');
        }

        // ---------- ▽▽▽ テンプレートに「取得したレコード」の情報を渡す ▽▽▽ ----------
        return view('detail', ['book' => $id]);

    } /* edit */



    // ==================== ▼▼▼ テクノメンテの機能▼▼▼ ====================
    public function editSave(BookRegisterPostRequest $request, $id) {

        // ---------- ▽▽▽ formからの情報を取得する ▽▽▽ ----------
        $datum = $request->validated();

        // ---------- ▽▽▽ レコードを取得する ▽▽▽ ----------
        $id = BookModel::find($id);
        if ($id === null) {
            return redirect('/edit');
        }

        // ---------- ▽▽▽ レコードの内容をUPDATEする ▽▽▽ ----------
        $id->title = $datum['title'];
        $id->content = $datum['content'];
        $id->device = $datum['device'];

        // ----- ▽▽▽ サムネイル ▽▽▽ -----
        // ▽▽▽ 保存するディレクトリ ▽▽▽
        $thum_dir = 'thumbnail';


        if($datum['thumbnail'] !== null) {}


        // ▽▽▽ ファイル名取得 ▽▽▽
        $thum_file_name = $request->file('thumbnail')->getClientOriginalName();
        // ▽▽▽ サムネイル画像をthumbnailディレクトリに保存 ▽▽▽
        $request->file('thumbnail')->storeAs('public/' . $thum_dir, $thum_file_name);
        // ▽▽▽ ファイルのパスをDBに保存 ▽▽▽
        $datum['thumbnail'] = 'storage/' . $thum_dir . '/' . $thum_file_name;
        // ▽▽▽ UPDATE ▽▽▽
        $id->thumbnail = $datum['thumbnail'];

        // ----- ▽▽▽ PDF ▽▽▽ -----
        // ▽▽▽ 保存するディレクトリ ▽▽▽
        $pdf_dir = 'pdf';
         // ▽▽▽ ファイル名取得 ▽▽▽
        $pdf_file_name = $request->file('pdf')->getClientOriginalName();
        // ▽▽▽ PDFをpdfディレクトリに保存 ▽▽▽
        $request->file('pdf')->storeAs('public/' . $pdf_dir, $pdf_file_name);
        // ▽▽▽ ファイルのパスをDBに保存 ▽▽▽
        $datum['pdf'] = 'storage/' . $pdf_dir . '/' . $pdf_file_name;
        // ▽▽▽ UPDATE ▽▽▽
        $id->pdf = $datum['pdf'];

        // ---------- ▽▽▽ レコードを更新 ▽▽▽ ----------
        $id->save();

        // ---------- ▽▽▽ 編集成功 ▽▽▽ ----------
        $request->session()->flash('book_edit_success', true);

        // ---------- ▽▽▽ 詳細閲覧画面にリダイレクトする ▽▽▽ ----------
        return redirect(route('edit', ['id' => $id]));
    }



}
