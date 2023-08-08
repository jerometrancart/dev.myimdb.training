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
        //pluck
        $movies = $query->pluck('title','id');

        $result['list_of_col_values_with_key']['title'] = 'Retrieving a list of column values with key';
        $result['list_of_col_values_with_key']['sql'] = $query->toSql();
        $result['list_of_col_values']['type'] = get_debug_type($movies);
        $result['list_of_col_values_with_key']['data'] = $movies;

        //count
        $data = $query->count();
        $result['count']['title'] = 'get number of movies';
        $result['count']['sql'] = $query->toSql();
        $result['count']['type'] = get_debug_type($data);
        $result['count']['data']  = $data;

        //max
        $data = $query->max('rating');
        $result['max']['title'] = 'get max rating of movies';
        $result['max']['sql'] = $query->toSql();
        $result['max']['type'] = get_debug_type($data);
        $result['max']['data']  = $data;

        //min
        $data = $query->min('rating');
        $result['min']['title'] = 'get min rating of movies';
        $result['min']['sql'] = $query->toSql();
        $result['min']['type'] = get_debug_type($data);
        $result['min']['data']  = $data;

        //avg
        $data = $query->avg('rating');
        $result['avg']['title'] = 'get avg rating of movies';
        $result['avg']['sql'] = $query->toSql();
        $result['avg']['type'] = get_debug_type($data);
        $result['avg']['data']  = $data;

        //avg with filter
        $data = $query
            ->where('year','>=', '1975')
            ->avg('rating');

        $result['avg_filter']['title'] = 'get avg rating of movies filter by year 1975';
        $result['avg_filter']['sql'] = $query->toSql();
        $result['avg_filter']['type'] = get_debug_type($data);
        $result['avg_filter']['avg_filter']['data']  = $data;

        return ['title' => 'Retrieving a list of column values with key', 'method' => 'getSingleRowById()', 'result' => $result];
    }





}
