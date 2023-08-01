<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>MyImdb | @yield('title', 'MyImdb')</title>
    </head>
    <body>
        <header>
            This is the master header
        </header>

        @section('sidebar')
            <hr>
            @include('backoffice.partials._menu',[
                'items' => [
                    [
                        'link' => route('backoffice.movies.index'),
                        'title' => 'Movies'
                    ]
                ]
            ])
            <hr>

        @show

        @yield('content')

        <footer>
            <hr>
            This is the master footer
            <hr>
        </footer>
    </body>
</html>
