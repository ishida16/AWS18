<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>API mail view</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>API Mail View</h1>
        <div class='quest'>
            <!--{ {$quest['origin']}} -->
            <!-- { {$quest['data']}} -->
            {{$quest}}
            <!-- { {$quest['data']->title}} -->
        </div>
        <div class="footer">
            <a href="/a">戻る</a>
        </div>
    </body>
</html>