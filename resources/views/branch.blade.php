@extends('layout')


@section('contents')

<div class="techno_main">
    <h1>テクノメンテ投稿用</h1>

    <ul class="branch">
        <li><a href="/form">テクノメンテ新規投稿</a></li>
        <li><a href="/edit">投稿したテクノメンテの編集</a></li>
    </ul>
    <p class="logout"><a href="/logout">ログアウト</a></p>

</div><!-- .techno_main -->

@endsection