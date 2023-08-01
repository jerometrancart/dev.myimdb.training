<html>
<title>List of movies</title>
    <body>
        List of movies :
        <ul>
            @foreach( $movies as $movie)
                <li>{{$movie['title'] }}, {{ $movie['year'] }}</li>
            @endforeach
        </ul>
    </body>
</html>
