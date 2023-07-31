<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request, $genre)
    {
        //retrieve parameter sort from request
        $sort = $request->input('sort');

        $html = "List of movies with genre: <strong>{$genre}</strong><br/>";

        //sort list of movies
        switch ($sort)
        {
            case('asc'):
                $html .= "<ul>
                                <li>Halloween</li>
                                <li>Jaw</li>
                           </ul>";
                break;
            case ('desc'):
                $html .= "<ul>
                                <li>Jaw</li>
                                <li>Halloween</li>
                          </ul>";
                break;
            default:
                $html .= "<ul>
                                <li>Halloween</li>
                                <li>Jaw</li>
                           </ul>";
                break;


        }
        $response =new \Illuminate\Http\Response($html);
        return $response;
    }//
}
