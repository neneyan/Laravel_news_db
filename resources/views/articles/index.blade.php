<!-- resources/views/layouts/app と紐付け -->
@extends('layouts.app')

<!-- ページの中身部分 -->
@section('content')

    <div class="page_title">
      <h1>
        <a href="/articles">Laravel News</a>
      </h1>
    </div>

    <div class="page_introduce">
      <h3>
        さぁ、最新のニュースをシェアしましょう!
      </h3>
    </div>

    <!-- 投稿完了時にメッセージを表示 -->
    @if(Session::has('message'))
	  <div class="message">
		<p>{{ Session::get('message') }}</p>
	  </div>
    @endif

    <!-- エラーメッセージを表示 -->
    @foreach($errors->all() as $message)
	  <p class="error_message">{{ $message }}</p>
    @endforeach


<!-- 投稿フォーム -->
<form method="post" action="{{ route('articles.index') }}" enctype="multipart/form-data"　onsubmit="return submit_check_function()">
@csrf
      
    <div class="input_title">
      <label for="form_title">タイトル</label> 
      <input class="title_form" name="title" value="{{ old('title') }}">
    </div>
      
    <div class="input_comment">
      <label for="text">記事</label> 
      <textarea class="text_form" name="text">{{ old('text') }}</textarea>        
    </div>
    <button type="submit" class="btn_1">投稿する</button>

</form>


<!-- 投稿内容表示 -->    
                    
    @foreach ($articles as $article)

      <div class="articles_list">
        <h3 class="list">{{ $article->title }}</h3>
        <p class="list">{{ $article->text }}</p>
        <p class="list"><a href="{{ route('articles.show' , $article->id) }}">記事全文・コメントを見る</a></p>
      </div>
        
    @endforeach

    <!-- Scripts -->
    <script src="{{ asset('js/posts.js') }}"></script>

@endsection