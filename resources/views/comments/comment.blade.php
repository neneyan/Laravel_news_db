<!-- resources/views/layouts/app と紐付け -->
@extends('layouts.app')

<!-- ページの中身部分 -->
@section('content')

    <div class="page_title">
      <h1>
        <a href="/articles">Laravel News</a>
      </h1>
    </div>

    <div class="d_articles_list">

      <p>タイトル：{{ $articles->title }}</p>
      <p>記事：{{ $articles->text }}</p>

    </div>
      
    
    <!-- コメント投稿フォーム -->
    <form method="post" action="{{ route('comments.store') }}">
    @csrf
      
      <div class="input_comment">
        
        <input type="hidden" name="article_id" value="{{ $articles->id }}" >
        <textarea class="comment_form" name="text" cols="50" rows="10">{{ old('text') }}</textarea>        
      </div>
      <button type="submit" class="btn_2">コメントする</button>

    </form>
    
    
    <!-- コメント表示 -->
      <h3>コメント一覧</h3>

      @foreach($comments as $comment)

        <div class="comments_list">
	        <p class="list">{{ $comment->text }}</p>
        </div>
        <div>
          <form method="post" action="{{ route('comments.destroy' , $comment->id) }}" id="form_{{ $comment->id }}" class="">
            @csrf
            @method('delete')
            <input type="submit" value="削除" class="btn_3" onclick='return confirm("削除しますか？");'>
          </form>
        </div>
          

      @endforeach

@endsection