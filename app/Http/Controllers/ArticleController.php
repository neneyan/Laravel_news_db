<?php

namespace App\Http\Controllers;

use App\Article;
use App\Comment;
use Illuminate\Http\Request;
use Validator;

class ArticleController extends Controller
{

  // 初期表示（記事投稿の画面）
  public function index()
  {
    // リソースのリスト表示
    $articles = Article::all();
    return view("articles.index", ['articles' => $articles]);
  }



  // どのデータをどのテーブルに保存するか
  public function store(Request $request)
  {
    // 新しく作成したリソースをDBに保存
      
    //インスタンス作成
    $articles = new Article();
    
    // タイトル
    $articles->title = $request->title;
    // 記事内容
    $articles->text = $request->text;
   

    // 「入力必須」のルール
    $rules = [
      'title' => 'required|max:30',
      'text' => 'required',
    ];
    
    // エラーメッセージの表示
    $messages = array(
      'title.required' => 'タイトルは必須です。',
      'text.required' => '本文は必須です。',
    );
    
    // 入力値のチェック
    $validator = Validator::make($request->all(), $rules, $messages);
    
    // エラー文表示の処理を実行
    if ($validator->fails()) {
      return redirect()->route("index")->withErrors($validator->messages());
    }
    
    $articles->save();

    return redirect("/")->with('message','投稿が完了しました。');
  }


  
  

}