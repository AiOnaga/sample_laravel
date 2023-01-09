<?php

namespace App\Http\Controllers\Sample;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//
class IndexController extends Controller
{
    //showメソッドを作成/sampleがgetでリクエストされたらルーディングする
    public function show()
    {
        //Helloを返す
        return 'Hello';
    }
    //showIdメソッドを作成　ルーディングの/idを$idとして受け取る
    public function showId($id)
    {
        //受け取ったidを$idに入れてHello{$id}として返す
        return "Hello {$id}";
    }
        
}

