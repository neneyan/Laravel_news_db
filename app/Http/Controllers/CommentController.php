<?php

namespace App\Http\Controllers;

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

  public function destroy($id)
    {
      $comments=Comment::find($id);
      $comments->delete();

      return redirect()->back();
      
      // route ('articles.show')->with('削除しました');
    }

}
