@extends('layout')

@section('title')編集 | @endsection

@section('contents')

<div class="techno_main">
    <h1>投稿したテクノメンテの編集</h1>

    <ul class="list">
        @foreach ($list as $book)
        <li><a href="{{ route('edit', ['id' => $book->id]) }}">{{ $book->title }}</a></li>
        @endforeach
    </ul>
    <p class="logout"><a href="/logout">ログアウト</a></p>

</div><!-- .techno_main -->

@endsection