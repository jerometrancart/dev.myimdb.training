<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request, $genre)
    {
        $html = "List of movies with genre : <strong>{$genre}</strong><br/>";

        $html .= "
        <ul>
            <li>Halloween</li>
            <li>Jaw</li>
        </ul>";

        $html .='Uri :'.$request->path();
        $response =new \Illuminate\Http\Response($html);
        return $response;
    }//
}
