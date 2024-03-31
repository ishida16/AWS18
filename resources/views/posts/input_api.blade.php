<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>mail send</title>
    </head>
    <body>
        <h1>API mail send</h1>
        <form action="/b" method="POST">
            @csrf
            <div class="mail">
                <h2>To Mail add</h2>
                <input type="text" name="post[mail]" value="ishida1623@gmail.com"/>
            </div>
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" value="Subject"/>
            </div>
            <div class="body">
                <h2>Body</h2>
                <input type="test" name="post[output]" value="No message"/>
            </div>
            <input type="submit" value="実行"/>
        </form>
        <div class="footer">
            <a href="/view">DB表示</a>
        </div>
    </body>
</html>