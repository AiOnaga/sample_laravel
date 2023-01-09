<?php

namespace App\Services;

use App\Models\Tweet;

use function PHPUnit\Framework\returnSelf;

class TweetService
{

  // CRUDのRead
  public function getTweets()
  {
    // tweetsテーブルから(Tweetモデル)created_atの降順で全データ取得し(orderBy('created_at', 'DESC')->get())、$tweetsに入れる
    return Tweet::orderBy('created_at', 'DESC')->get();
    // return Tweet::orderByDESC('created_at')->get();
  }
  public function checkOwnTweet(int $userId, int $tweetId): bool
  {
    $tweet = Tweet::where('id', $tweetId)->first();
    if (!$tweet){
        return false;
    }

    return $tweet->user_id === $userId;
  }

  // CRUDのCreate
  // public function createTweet()
  // {

  // }

}