<html>
<title>List of movies</title>

    <body>
        List of movies  :
        <hr>
        <p> Loop for</p>
        <ul>
            @for ($i = 0; $i < count($movies); $i++)
                <li>{{ $movies[$i]['title'] .',  '.$movies[$i]['year'] }}</li>
            @endfor
        </ul>
        <hr>

        <p>Loop foreach</p>
        <ul>

            @foreach( $movies as $movie)
                <li>{{ $movie['title'] .',  '.$movie['year'] }}</li>
            @endforeach
        </ul>

        <p>Loop forelse</p>
        <ul>

            @forelse( $movies as $movie)
                <li>{{ $movie['title'] .',  '.$movie['year'] }}</li>
            @empty
                    <li>No movies</li>
            @endforelse
        </ul>

        <p>Loop while</p>
        <ul>
            @php $i = 0 @endphp
            @while( $i < count($movies))
                <li>{{ $movies[$i]['title'] .',  '.$movies[$i]['year'] }}</li>
                @php $i++ @endphp
            @endwhile
        </ul>

        <p>Loop foreach with loop variable</p>
            @foreach( $movies as $movie)
                <li>
                    @if ($loop->first)
                        this is the first movie -->
                    @endif
                    
                        {{ $movie['title'] .',  '.$movie['year'] }}
                    @if ($loop->last)
                        <-- this is the last movie
                    @endif
                </li>
            @endforeach

    </body>
</html>
