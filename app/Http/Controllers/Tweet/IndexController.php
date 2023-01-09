<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
// use App\Models\Tweet;
use App\Services\TweetService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //__invoke 一つのコントローラークラスに１つのメソッドしかルーディングできない
    //
    public function __invoke(Request $request, TweetService $tweetService)
    {
        // tweetsテーブルから(Tweetモデル)created_atの降順で全データ取得し(orderBy('created_at', 'DESC')->get())、$tweetsに入れる
        // $tweets = Tweet::orderBy('created_at', 'DESC')->get();

        // $tweetService = new TweetService();

        // (雑に書くと)tweetのデータ取得(= CRUD)
        $tweets = $tweetService->getTweets();
        
        //viewのtweet/index(tweet.index)ディレクトリのbladeを返す、
        // with関数tweet（変数、受け取ったデータ）を$tweetとして返す
        return view('tweet.index')
            ->with('tweets',$tweets);

        // return view('tweet.index')
        //     ->with('name' , 'laravel')
        //     ->with('version','8');
    }
}

