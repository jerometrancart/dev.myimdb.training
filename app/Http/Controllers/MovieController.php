<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MovieController extends Controller
{
    public function index()
    {
        //store movies list in array
        $movies = [
            [
                'title' => 'Halloween',
                'year'=> 1978
            ],
            [
                'title' => 'Jaw',
                'year'=> 1975
            ],
            [
                'title' => 'The Godfather',
                'year'=> 1972
            ],
            [
                'title' => 'Serpico',
                'year'=> 1973
            ],
        ];
        $genre ='action';

        //age of user
        $age = "15";

        //call view 'index' and transmit movies to view
        return view( 'backoffice.movies.index', compact('movies', 'genre', 'age'));
    }
}


