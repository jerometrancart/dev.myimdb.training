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
        //select
        $query = DB::table('movies');
        $query->select('id', 'title', 'year');
        $query->limit(5);
        $movies = $query->get();

        $result['columns']['title'] = 'Get movies with id, title, year';
        $result['columns']['sql'] = $query->toSql();
        $result['columns']['type'] = get_debug_type($movies);
        $result['columns']['data'] = $movies;

        //distinct
        $query = DB::table('movies');
        $query->select('id', 'title', 'year')->distinct();
        $query->limit(5);
        $movies = $query->get();

        $result['distinct']['title'] = 'Get distinct movies with id, title, year';
        $result['distinct']['sql'] = $query->toSql();
        $result['distinct']['type'] = get_debug_type($movies);
        $result['distinct']['data'] = $movies;

        //add select
        $query = DB::table('movies');
        $query->select('id', 'title', 'year');
        $query->addSelect('rating');
        $query->limit(5);
        $movies = $query->get();

        $result['add_select']['title'] = 'Add a movie to selection';
        $result['add_select']['sql'] = $query->toSql();
        $result['add_select']['type'] = get_debug_type($movies);
        $result['add_select']['data'] = $movies;


        return ['title' => 'Select', 'method' => 'getSelect()', 'result' => $result];
    }





}
