<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Validator;

class CommentController extends Controller
{

  // どのデータをどのテーブルに保存するか
  public function store(Request $request) {

    // インスタンス作成
    $comments = new Comment();

    // コメント内容
    // ( input )
    $comments->article_id = $request->input('article_id');
    $comments->text = $request->input('text');
    $comments->save();
    
    return redirect()->back();
    //('/comments')->with('message','投稿が完了しました。');
  }


  // 「記事全文・コメントを見る」ページへの遷移
  public function show($id)
  {
	  $articles = Article::find($id);
    $comments = Comment::where('article_id',$id)->get();

    // orderBy で並び替え
    // orderBy('created_at', 'desc')->get();

    // 指定したViewにデータを渡す
	  return view('comments.comment', [
      'articles' => $articles,
      'comments' => $comments,
    ]);
  }


  public function destroy($id)
    {
      $comments=Comment::find($id);
      $comments->delete();

      return redirect()->back();
      
      // route ('articles.show')->with('削除しました');
    }

}
