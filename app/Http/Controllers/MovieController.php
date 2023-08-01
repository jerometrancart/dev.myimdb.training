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

        //call view 'index' and transmit movies to view
        return response()
            ->view('index', [
                'movies' => $movies
            ])
            ->header('X-HEADER-ONE', 'Value 1')
            ->header('X-HEADER-TWO', 'Value 2')
            ;
    }

}
