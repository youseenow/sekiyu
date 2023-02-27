@extends('layout')

@section('title')投稿フォーム | @endsection

@section('contents')
<div class="techno_main">
    <h1>テクノメンテ新規投稿</h1>

    @if ($errors->any()) {{-- エラーがあるかどうか？ --}}
    <div class="error"> {{-- デザインを考慮したタグ --}}
        @foreach ($errors->all() as $error) {{-- エラーメッセージの表示 --}}
            {{ $error }}<br>
        @endforeach
    </div>
    @endif

    @if (session('books_register_success') == true)
    <div class="message">
        テクノメンテを投稿しました。
    </div>
    @endif

    <form method="post" action="/upload" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <th>タイトル</th>
                <td><input type="text" name="title" value="{{ old('title') }}"></td>
            </tr>
            <tr>
                <th>内容詳細</th>
                <td><textarea name="content">{{ old('content') }}</textarea></td>
            </tr>
            <tr>
                <th>掲載機器</th>
                <td><textarea name="device">{{ old('device') }}</textarea></td>
            </tr>
            <tr>
                <th>サムネイル画像</th>
                <td><input type="file" name="thumbnail"></td>
            </tr>
            <tr>
                <th>PDF</th>
                <td><input type="file" name="pdf"></td>
            </tr>
        </table>
        <button class="center">投稿する</button>
    </form>
    <p class="logout"><a href="/logout">ログアウト</a></p>
</div><!-- .techno_main -->
@endsection
