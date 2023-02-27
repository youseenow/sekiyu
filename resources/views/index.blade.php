@extends('layout')

@section('contents')
<header>
    <div class="header">

        <h1><img src="../images/cont_title.gif" alt="日本石油燃焼機器保守協会情報"></h1>

        <nav>
            <ul>
                <li><a href="http://nenshou.xsrv.jp/greeting/index.html">ご挨拶</a></li>
                <li><a href="http://nenshou.xsrv.jp/business/index.html">事業内容</a></li>
                <li class="mb"><a href="http://nenshou.xsrv.jp/supervisor/index.html">石油機器技術管理士とは</a></li>

                <li><a class="blink" href="http://nenshou.xsrv.jp/covid/index.html">新型コロナウイルスの対応について</a></li>
                <li class="mb"><a href="http://nenshou.xsrv.jp/img/dvd3.pdf" target="_blank">トピックス(DVD受講を開始しました)</a></li>

                <li><a href="http://nenshou.xsrv.jp/course/shinki05.php">［令和5年度］<br>講習日程と講習会場(新規)</a></li>
                <li><a href="http://nenshou.xsrv.jp/course/shinki04.php">［令和4年度］<br>講習日程と講習会場(新規)</a></li>
                <li><a href="http://nenshou.xsrv.jp/course/retake05.php">［令和5年度］<br>講習日程と講習会場(再講習)</a></li>
                <li><a href="http://nenshou.xsrv.jp/course/retake04.php">［令和4年度］<br>講習日程と講習会場(再講習)</a></li>

                <li><a href="http://nenshou.xsrv.jp/shinki/flow.html">石油機器技術管理講習(新規)受講手続き</a></li>
                <li><a href="http://nenshou.xsrv.jp/passed/index.html">合格者(資格者)の発表</a></li>
                <li><a href="http://nenshou.xsrv.jp/retake/index.html">石油機器技術管理｢再｣講習の手続き</a></li>
                <li><a href="http://nenshou.xsrv.jp/hakkou/index.html">石油機器技術管理士登録証(看板)の発行</a></li>
                <li><a href="http://nenshou.xsrv.jp/tenken/index.html">点検整備会員制度とは</a></li>
                <li><a href="http://nenshou.xsrv.jp/techno/index.html">情報機関紙｢テクノメンテ｣の刊行</a></li>
                <li><a href="http://nenshou.xsrv.jp/reference/index.html">参考資料</a></li>
                <li><a href="http://nenshou.xsrv.jp/link/index.html">リンク集</a></li>
                <li><a href="http://nenshou.xsrv.jp/privacy/index.html">個人情報について</a></li>
                <li><a href="http://nenshou.xsrv.jp/index.html">ホームに戻る</a></li>
            </ul>

            <div class="dvdbanner">
                <a href="http://nenshou.xsrv.jp/img/dvdlink2.pdf" target="_blank"><img src="../images/dvdbanner.gif"></a>
            </div>
        </nav>


    </div><!-- .header -->
</header>





<main>
    <div class="main magazine">

    <h3>■ 情報機関誌「テクノメンテ」</h3>

    <div class="search_form">
        <form method="get" id="searchform" action="http://localhost/sekiyu/course/wp">
            <input type="text" name="s" id="s" placeholder="キーワードを入力">
            <button type="submit">検 索</button>
        </form>
    </div><!-- .search_form -->



    <article class="magazine_wrap">

        @foreach ($list as $book)
        <div class="magazine_list">
            <div class="img">
                <a href="{{ asset($book->pdf) }}" target="_blank">
                    <img src="{{ asset($book->thumbnail) }}">
                    <span>テクノメンテを見る</span>
                </a>
            </div><!-- .img -->
            <div class="text">
                <h4>{{ $book->title }}</h4>
                <section>
                    <div>{!! nl2br($book->content) !!}</div>
                    <div>{!! nl2br($book->device) !!}</div>
                </section>
            </div><!-- .text -->
        </div>
        @endforeach



        <div class="pagenavi">

            @if ($list->previousPageUrl() !== null)
                <a href="{{ $list->previousPageUrl() }}">前のページ</a>
            @else
                <span>前のページ</span>
            @endif

            @if ($list->nextPageUrl() !== null)
                <a href="{{ $list->nextPageUrl() }}">次のページ</a>
            @else
                <span>次のページ</span>
            @endif


        </div><!-- .pagenavi -->

    </article><!-- .magazine_wrap -->



    </div><!-- .main -->
</main>
@endsection