<?php

namespace App\Http\Controllers\Tweet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tweet\CreateRequest;
use Illuminate\Http\Request;
use App\Models\Tweet;
use Illuminate\Mail\Mailables\Content;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(CreateRequest $request)
    {
        // dd($request); // dump & die

        // save()使うパターン
        // $tweet = new Tweet; 
        
        // $tweet->content = $request->tweet();
        // $tweet->user_id = $request->userId();
        // // $tweet->content = $request->input('tweet');
        // $tweet->save();

        // dd($request->userId());

        // create()を使うパターン ※$fillableプロパティの指定が必要！
        $tweet = Tweet::create([
            'content' => $request->input('tweet'),
            'user_id' => $request->userId()
        ]);

        // $tweet->user_id = $request->userId(); //ここでUserIdを保存している

        return redirect()->route('tweet.index');
    }
}
