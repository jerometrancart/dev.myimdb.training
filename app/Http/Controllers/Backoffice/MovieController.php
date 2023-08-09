<?php

namespace App\Http\Controllers\Backoffice;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class MovieController extends Controller
{
    public function index(Request $request )
    {
        $input = $request->all();



        //store movies list in collection
        $input = ( !isset($input['sort_by']) ) ? array_merge(['sort_by' => 'id', 'sort_dir' => 'asc'], $input) : $input;
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

    public function update($id, Request $request)
    {
        //get the movie based on id
        $movie = $this-> getMovie($id);

        $input = $request->only([
            'title',
            'year',
            'running_time',
            'synopsis',
            'rating'
        ]);

        $input['updated_at'] = (new \DateTime())->format('Y-m-d H:i:s');

        //update in db
        DB::table('movies')
            ->where('id', '=', $movie->id)
            ->update($input);

        //redirect to action edit
        return Redirect::route('backoffice.movies.index');
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

        //search by id
        if(isset($params['id']) && !empty($params['id']))
        {
            $query->where('id', '=', $params['id']);
        }
        //search by title
        if(isset($params['title']) && !empty($params['title']))
        {
            $query->where('title', 'like', '%'.$params['title'].'%');
        }
        //search by year
        if(isset($params['start_year']) && !empty($params['start_year']))
        {
            $query->where('year', '>=', $params['start_year']);
        }
        if(isset($params['end-year']) && !empty($params['end-year']))
        {
            $query->where('year', '<=', $params['end-year']);
        }
        //search by created at
        if(isset($params['start_created_at']) && !empty($params['start_created_at']))
        {
            $query->where('created_at', '>=', $params['start_created_at']);
        }
        if(isset($params['end_created_at']) && !empty($params['end_created_at']))
        {
            $query->where('title', '<=', $params['end_created_at']);
        }

        //search by running time
        if(isset($params['start_running_time']) && !empty($params['start_running_time']))
        {
            $query->where('running_time', '>=', $params['start_running_time']);
        }
        if(isset($params['end_running_time']) && !empty($params['end_running_time']))
        {
            $query->where('running_time', '<=', $params['end_running_time']);
        }

        //search by rating
        if(isset($params['start_rating']) && !empty($params['start_rating']))
        {
            $query->where('rating', '>=', $params['start_rating']);
        }
        if(isset($params['end_rating']) && !empty($params['end_rating']))
        {
            $query->where('rating', '<=', $params['end_rating']);
        }

        //search by updated at
        if(isset($params['start_updated_at']) && !empty($params['start_updated_at']))
        {
            $query->where('updated_at', '>=', $params['start_updated_at']);
        }
        if(isset($params['end_updated_at']) && !empty($params['end_updated_at']))
        {
            $query->where('updated_at', '<=', $params['end_updated_at']);
        }

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
        $movie = DB::table('movies')->find($id);

        return $movie;
    }


}


