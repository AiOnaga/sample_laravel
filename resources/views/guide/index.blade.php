<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <details>
    <summary>「->」と「=>」の違い</summary>
    <div>
      <p>
        "->"はメソッドをつなぐ時に使う。<br>
        例)$tweet(TweetModel)に対して使えるメソッド、get()を使おうとすると、、、<br>
        $tweet->get();<br>
        Tweet::where('id', $tweetId)->get();
      </p>
      <p>
        "=>"は配列のkeyとvalueの定義に使う。<br>

        Rubyの時は、、、<br>
        schedule_list = {start: '2022-11-30', end: '2022-12-30'}<br>

        ↑がPHPだと、、、<br>
        $scheduleList = ['start' => '2022-11-30', 'end' => '2022-12-30'];<br>
        ['key' => 'value']で書く時に使う。<br>
        ちなみにPHPで[]は配列を意味する(Rubyも同じ)
      </p>
    </div>
  </details>
</body>
</html>