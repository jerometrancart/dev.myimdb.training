<?php

namespace App\Http\Controllers\Backoffice;

use App\Http\Controllers\Controller;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DatabaseQueryBuilderController extends Controller
{
    /**
     * Show the query results
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $query = $request->get('query');

        $result = [
            'sql' => '',
            'result' => [],
            'title' => ''
        ];

        $q = $request->get('q');
        switch ($q)
        {
            case('generic-query'):
                $result = $this->getGenericQuery();
                break;
        }

        $menu = $this->getMenu();

        $data = (!empty($result['result']))? json_encode($result['result'], JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) : '';


        $title = $result['title'];

        $method = isset($result['method'])? $result['method'] : '' ;

        return view('backoffice.database-query.query-builder', compact('menu', 'title','method', 'query','data'));
    }

    /**
     * return the internal navigation menu
     * @return array
     */
    public function getMenu()
    {
        $menu = [
            [
                'title' => 'Generic Query',
                'items' => [
                    [
                        'title' => 'Generic Query',
                        'link' => route('backoffice.database.query.builder', ['q' => 'generic-query'])
                    ],
                ]
            ]
        ];

        return $menu;
    }

    /**
     * Execute a query QueryBuilder against database
     * @return array
     */
    /**
     * Execute a query QueryBuilder against database
     * @return array
     */
    public function getGenericQuery()
    {
        //inner join clause
        $query = DB::table('movies')
            ->join('movies_genres', 'movies.id', 'movies_genres.movie_id')
            ->join('genres', 'genres.id', 'movies_genres.genre_id')
            ->select('movies.title', 'genres.name as genre_name')
            ->limit(5);
        $movies = $query->get();

        $result['inner_join']['title'] = 'Get movies with release dates';
        $result['inner_join']['sql'] = $query->toSql();
        $result['inner_join']['type'] = get_debug_type($movies);
        $result['inner_join']['data'] = $movies;



        //advanced join clause
        $query = DB::table('movies');
        $query->select('movies.title', 'genres.name as genre_name');
        $query->join('movies_genres', 'movies.id', 'movies_genres.movie_id');
        $query->join('genres',function(JoinClause $join)
            {
                $join->on('genres.id', '=', 'movies_genres.genre_id')
                    ->where('genres.name', '=', 'Adventure');
            })->limit(5);

        $movies = $query->get();

        $result['left_join']['title'] = 'Get movies with genre = Adventure';
        $result['left_join']['sql'] = $query->toSql();
        $result['left_join']['type'] = get_debug_type($movies);
        $result['left_join']['data'] = $movies;

        return ['title' => 'Joins', 'method' => 'getJoins()', 'result' => $result];
    }





}
