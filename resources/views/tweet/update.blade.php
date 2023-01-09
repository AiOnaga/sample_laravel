{{-- <!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
      content="width=device-width, user-scaable=no, intitial-scale=1.0">
  </head>

</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>つぶやきアプリ</title>
</head>
<body>
  <h1>つぶやきを編集をする</h1>
  <div>
    <a href="{{ route('tweet.index') }}">< 戻る</a>
    <p>投稿フォーム</p>
    @if (session('feedback.success'))
        <p style="green">{{ session('feedback.success') }}</p>
    @endif
    <form action="{{ route('tweet.update.put', ['tweetId' => $tweet->id]) }}" method="post">
      @method('PUT')
      @csrf
      <label for="tweet-content">つぶやき</label>
      <span>140文字まで</span>
      <textarea id="tweet-content" name="tweet" type="text" placeholder="つぶやきを入力">{{ $tweet->content }}</textarea>
      @error('tweet')
      <p style="color: red;">{{  $message }}</p>
      @enderror
      <button type="submit">編集</button>
    </form>
  </div>
</body>
</html>