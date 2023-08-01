<html>
<title>List of movies</title>

    <body>
        List of movies with genre {{ $genre }}  :
        <ul>
            @if($age < 18)
                <p> You have {{ $age }} years old, you are not allowed to see this list of movies</p>
            @else
                Number of movies:
                    @if (count($movies) == 1)
                    One movie
                    @elseif (count($movies) >= 1)
                    {{ count($movies) }} movies
                    @else
                    No movies
                    @endif
                <br />
                <br />
                @foreach( $movies as $movie)
                    <li>{{ strtoupper($movie['title']) .',  '.$movie['year'] }}</li>
                @endforeach
            @endif
        </ul>
    </body>
</html>
