<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>mail list</h1>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    {{ $post->id }} |
                    {{ $post->mail }} |
                    {{ $post->title }} |
                    {{ $post->output }} |
                    {{ $post->created_at }}
                </div>
            @endforeach
        </div>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>