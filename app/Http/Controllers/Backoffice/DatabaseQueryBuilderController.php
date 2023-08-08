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




        $query = DB::table('movies');
        $movies = $query->pluck('title','id');

        $result['single_row']['title'] = 'Get all movies';
        $result['single_row']['sql'] = $query->toSql();
        $result['single_row']['type'] = get_debug_type($movies);
        $result['single_row']['data'] = $movies;

        return ['title' => 'Retrieving a list of column values with key', 'method' => 'getSingleRowById()', 'result' => $result];
    }





}
