<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use Illuminate\Http\Request;

class TweetController extends Controller
{
  public function index()
  {
    $tweets = Tweet::all();

    return view('sample.index')->with('tweets', $tweets->reverse());
  }

  public function store(CreateRequest $request)
  {
    $tweet = Tweet::create([
      'content' => $request->input('tweet')
    ]);
    return redirect()->route('tweet.index');
  }

  public function edit(Request $request)
  {
    $tweetId = (int) $request->route('tweetId');
    $tweet = Tweet::where('id',$tweetId)->firstOrFail();
    return view('sample.update')->with('tweet', $tweet);
  }

  public function update(UpdateRequest $request)
  {
    $tweetId = $request->id();//パスパラメーターのtweetidを取得
    $tweet = Tweet::where('id', $tweetId)->firstOrFail();//更新する対象のデータ（model)を取得する
    $tweet->content = $request->tweet();//更新するコンテントカラム（DB)、コンテント属性（model)に更新データを入れる（代入する）
    $tweet->save();//更新データを保存する

    return redirect()
      ->route('tweet.edit', ['tweetId' => $tweetId])
      ->with('feedback.success', "つぶやきを編集しました");
  }

  public function destroy(Request $request)
  {
    $tweetId = (int) $request->route('tweetId');
    $tweet = Tweet::where('id',$tweetId)->firstOrFail();
    $tweet->delete();
    return redirect()
      ->route('tweet.index')
      ->with('feedback.success',"つぶやきを削除しました");
  } 
}