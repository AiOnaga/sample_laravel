<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use App\Http\Requests\Tweet\UpdateRequest;
use App\Models\Tweet;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class TweetController_sample extends Controller
{

public function index()
  {
    $tweets = Tweet::all();

    return view('sample_copy.index')->with('tweets', $tweets->reverse());
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
  $tweet = Tweet::where('id', $tweetId)->firstOrFail();
  return view('sample_copy.update')->with('tweet', $tweet);
}

public function update(UpdateRequest $request)
{
  $tweetId = $request->id();
  $tweet = Tweet::where('id', $tweetId)->firstOrFail();
  $tweet->content = $request->tweet();
  $tweet->save();

  return redirect()
  ->route('tweet.edit', ['tweetId'=>$tweetId])
  ->with('feedback.success',"つぶやきを編集しました");
}

public function destroy(Request $request)
{
  $tweetId = (int) $request->route('tweetId');
  $tweet = Tweet::where('id', $tweetId)->firstOrFail();
  $tweet->delete();
  return redirect()
  ->route('tweet.index')
  ->with('feedback.success', "つぶやきを削除しました");
}

}