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
        //equal
        $query = DB::table('movies')
            ->select('movies.title','movies.rating')
            ->where('rating', '=', 8)
            ->limit(2);
        $movies = $query->get();

        $result['equal']['title'] = 'Get movies with rating = 8';
        $result['equal']['sql'] = $query->toSql();
        $result['equal']['type'] = get_debug_type($movies);
        $result['equal']['data'] = $movies;

        //granter than
        $query = DB::table('movies')
            ->select('movies.title','movies.rating')
            ->where('rating', '>=', 8)
            ->limit(5);
        $movies = $query->get();

        $result['granter_than']['title'] = 'Get movies with rating >= 8';
        $result['granter_than']['sql'] = $query->toSql();
        $result['granter_than']['type'] = get_debug_type($movies);
        $result['granter_than']['data'] = $movies;

        //like
        $query = DB::table('movies')
            ->select('movies.title','movies.rating')
            ->where('title', 'like', 'The%')
            ->limit(5);
        $movies = $query->get();

        $result['like']['title'] = 'Get movies with title contains \'The\'';
        $result['like']['sql'] = $query->toSql();
        $result['like']['type'] = get_debug_type($movies);
        $result['like']['data'] = $movies;

        //array of conditions
        $query = DB::table('movies')
            ->select('movies.title','movies.rating')
            ->where([
                ['title','like','%father%'],
                ['rating','>=','8']
            ])
            ->limit(5);
        $movies = $query->get();

        $result['like_and_conditions']['title'] = 'Get movies with title contains \'father\' and granter than 8';
        $result['like_and_conditions']['sql'] = $query->toSql();
        $result['like_and_conditions']['type'] = get_debug_type($movies);
        $result['like_and_conditions']['date'] = $movies;

        return ['title' => 'Where Clauses', 'method' => 'getWhereClauses()', 'result' => $result];
    }





}
