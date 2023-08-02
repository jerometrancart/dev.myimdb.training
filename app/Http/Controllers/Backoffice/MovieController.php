<?php

namespace App\Http\Controllers\Backoffice;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function index()
    {
        //store movies list in array

        $movies = $this->getMovies();

        //call view 'index' and transmit movies to view
        return view( 'backoffice.movies.index',
            compact('movies' ));
    }

    public function show($id)
    {
        $movie = $this->getMovie($id);

        return view('backoffice.movies.show',
        compact('movie'));
    }
    public function edit($id)
    {
        $movie = $this->getMovie($id);

        return view('backoffice.movies.edit',
        compact('movie'));
    }
    public function create()
    {
        return view('backoffice.movies.create');
    }

    public function delete($id)
    {
        $movie = $this->getMovie($id);

        return view('backoffice.movies.delete',
            compact('movie'));

    }
    public function getMovies()
    {
        //store movies list in array
        $datetime = new \Datetime();

        $movies = [
            [
                'id' => 1,
                'title' => 'Halloween',
                'year'=> 1978,
                'running_time' => 120,
                'rating' => 7.7,
                'synopsis' => "Fifteen years after murdering his sister on Halloween night 1963, Michael Myers escapes from a mental hospital and returns to the small town of Haddonfield, Illinois to kill again.",
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'id' => 2,
                'title' => 'Jaw',
                'year'=> 1975,
                'running_time' => 124,
                'rating' => 8.0,
                'synopsis' => "When a killer shark unleashes chaos on a beach community off Cape Cod, it's up to a local sheriff, a marine biologist, and an old seafarer to hunt the beast ...",
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'id' => 3,
                'title' => 'The Godfather',
                'year'=> 1972,
                'running_time' => 175,
                'rating' => 9.2,
                'synopsis' => "Don Vito Corleone, head of a mafia family, decides to hand over his empire to his youngest son Michael. However, his decision unintentionally puts the lives of his loved ones in grave danger.",
                'created_at' => $datetime,
                'updated_at' => $datetime
            ],
            [
                'id' => 4,
                'title' => 'Serpico',
                'year'=> 1973,
                'running_time' => 140,
                'rating' => 7.7,
                'synopsis' => "An honest New York cop named Frank Serpico blows the whistle on rampant corruption in the force only to have his comrades turn against him.",
                'created_at' => $datetime,
                'updated_at' => $datetime
            ]
        ];

        return $movies;

    }
    private function getMovie($id)
    {
        $movies = $this->getMovies();

        foreach ($movies as $movie)
        {
            if ($movie['id'] == $id)
            {
                return $movie;
            }
        }

        return null;
    }


}


