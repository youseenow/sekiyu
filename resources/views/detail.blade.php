@extends('layout')

@section('title')編集フォーム | @endsection

@section('contents')
<div class="techno_main">
    <h1>テクノメンテ編集</h1>

    @if ($errors->any()) {{-- エラーがあるかどうか？ --}}
    <div class="error"> {{-- デザインを考慮したタグ --}}
        @foreach ($errors->all() as $error) {{-- エラーメッセージの表示 --}}
            {{ $error }}<br>
        @endforeach
    </div>
    @endif

    @if (session('book_edit_success') == true)
    <div class="message">
        テクノメンテを編集しました。
    </div>
    @endif

    <form method="post" action="{{ route('edit_save', ['id' => $book->id]) }}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <table>
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="title" value="{{ $book->title }}"></td>
            </tr>
            <tr>
                <th>内容詳細</th>
                <td><textarea name="content">{{ $book->content }}</textarea></td>
            </tr>
            <tr>
                <th>掲載機器</th>
                <td><textarea name="device">{{ $book->device }}</textarea></td>
            </tr>
            <tr>
                <th>サムネイル画像</th>
                <td><input type="file" name="thumbnail" value="{{ $book->thumbnail }}"></td>
            </tr>
            <tr>
                <th>PDF</th>
                <td><input type="file" name="pdf" value="{{ $book->pdf }}"></td>
            </tr>
        </table>
        <button class="center">編集する</button>
    </form>
    <p class="logout"><a href="/logout">ログアウト</a></p>
</div><!-- .techno_main -->
@endsection
