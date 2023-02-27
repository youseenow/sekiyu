@extends('layout')

@section('title')ログイン | @endsection

@section('contents')
<div class="techno_main">
    <h1>テクノメンテ投稿用 ログイン</h1>

    @if ($errors->any()) {{-- エラーがあるかどうか？ --}}
    <div class="error"> {{-- デザインを考慮したタグ --}}
        @foreach ($errors->all() as $error) {{-- エラーメッセージの表示 --}}
            {{ $error }}<br>
        @endforeach
    </div>
    @endif

    <form method="post" method="/branch">
        @csrf
        <p><input type="text" name="login_id" value="{{ old('login_id') }}" placeholder="ID"></p>
        <p><input type="password" name="password" placeholder="パスワード"></p>
        <button>ログイン</button>
    </form>
</div><!-- .techno_main -->
@endsection