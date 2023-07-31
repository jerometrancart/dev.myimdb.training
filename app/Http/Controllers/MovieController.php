<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request, $genre)
    {
        if ($request->is('movies/list/genre/*'))
        {
            $html = "List of movies with genre : <strong>{$genre}</strong><br/>";
        }

        $html .= "
            <ul>
                <li>Halloween</li>
                <li>Jaw</li>
            </ul>";

        $html .= "<b>Current method: </b>". $request->method() . "<br><br>";

        if (!$request->isMethod('POST'))
        {
            $html .= "<b>Current method is not POST </b>";
        }

        $response =new \Illuminate\Http\Response($html);
        return $response;
    }//
}
