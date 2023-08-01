<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        //store movies list in array
        $movies = [
            [
            'title' => 'Halloween',
            'year' => 1978
            ],
            [
                'title' => 'Jaw',
                'year' => 1975
            ]
        ];

        $genre ='action';

        //age of user
        $age = "25";

        //call view 'index' and transmit movies to view
        return view( 'backoffice.movies.index', compact('movies', 'genre', 'age'));
    }
}


