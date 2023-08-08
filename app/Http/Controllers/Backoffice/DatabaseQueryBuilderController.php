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
        //insert

        $created_at = new \DateTime();
        $created_at = $created_at->format('Y-m-d H:i:s');

        DB::table('movies')->where('title', '=', 'Enter the Dragon')->delete();
        DB::table('movies')->insert(
            [
                'title' => 'Enter the Dragon',
                'year' => 1973,
                'running_time' => 102,
                'rating' => 7.7,
                'synopsis' => 'A martial artist agrees to spy on a reclusive crime lord using his invitation to a tournament',
                'created_at' => $created_at
            ]);

        $query = DB::table('movies')
            ->select('id', 'title', 'rating', 'created_at')
            ->orderBy('id', 'desc')
            ->limit(1);

        $result['insert']['title'] = 'Insert Movie : Enter the Dragon (1973)';
        $result['insert']['data'] = $query->get();

        return ['title' => 'Joins', 'method' => 'getJoins()', 'result' => $result];
    }





}
