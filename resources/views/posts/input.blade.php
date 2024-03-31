<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
    <body>
        <h1>mail send</h1>
        <form action="/posts" method="POST">
            @csrf
            <div class="mail">
                <h2>Mail</h2>
                <input type="text" name="post[mail]" value="ishida1623@gmail.com"/>
            </div>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" value="sed_test"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <input type="text" name="post[output]" value="No message"/>
            </div>
            <input type="submit" value="post"/>
            <div class="footer">
                <a href="/view">履歴表示</a>
            </div>
        </form>
    </body>
</html>