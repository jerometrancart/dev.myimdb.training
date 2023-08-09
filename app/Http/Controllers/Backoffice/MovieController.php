<?php

namespace App\Http\Controllers\Backoffice;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    public function index(Request $request )
    {
        $input = $request->all();

        //store movies list in collection
        $input = ( !isset($input['sort_by']) ) ? array_merge(['sort_by' => 'title', 'sort_dir' => 'asc'], $input) : $input;
        $movies = $this->getMovies($input);

        //call view 'backoffice.movies.index' and transmit movies to view
        return view( 'backoffice.movies.index',
            compact('movies', 'input'));
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
    public function getMovies($params = array())
    {
        $query = DB::table('movies')
            ->select('id', 'title', 'year', 'running_time', 'rating', 'created_at', 'updated_at');

        //sort by
        if(isset($params['sort_by']) && !empty($params['sort_by'])
            && isset($params['sort_dir']) && !empty($params['sort_dir']))
        {
            $sort_by = $params['sort_by'];
            $sort_dir = $params['sort_dir'];
        }
        $query->orderBy($sort_by, $sort_dir);

        $movies = $query->paginate(10)->withQueryString();

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


