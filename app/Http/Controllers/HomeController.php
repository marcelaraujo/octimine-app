<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\Contracts\BeerRepositoryInterface;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * @var BeerRepositoryInterface
     */
    protected $repository;

    /**
     * @param BeerRepositoryInterface $repository
     */
    public function __construct(BeerRepositoryInterface $repository) {
        $this->repository = $repository;
    }

    public function index() {

        $style01 = \App\Beer::select('types.name AS name', DB::raw('count(1) as total'))
            ->join('types', 'types.id', '=', 'beers.type_id')
            ->whereRaw('beers.created_at BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 1 MONTH ) ) AND NOW()')
            ->groupBy('beers.type_id')
            ->orderBy('total', 'desc')
            ->take(1)
            ->first();

        $style02 = \App\Beer::select('types.name AS name', DB::raw('count(1) as total'))
            ->join('types', 'types.id', '=', 'beers.type_id')
            ->whereRaw('beers.created_at BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 2 MONTH ) ) AND DATE( DATE_SUB( NOW() , INTERVAL 1 MONTH ) )')
            ->groupBy('beers.type_id')
            ->orderBy('total', 'desc')
            ->take(1)
            ->first();

        $client01 = \App\Beer::select('clients.full_name AS fullname', DB::raw('count(1) as total'))
            ->join('clients', 'clients.id', '=', 'beers.client_id')
            ->whereRaw('beers.created_at BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 1 MONTH ) ) AND NOW()')
            ->groupBy('beers.client_id')
            ->orderBy('total', 'desc')
            ->take(1)
            ->first();

        $client02 = \App\Beer::select('clients.full_name AS fullname', DB::raw('count(1) as total'))
            ->join('clients', 'clients.id', '=', 'beers.client_id')
            ->whereRaw('beers.created_at BETWEEN DATE( DATE_SUB( NOW() , INTERVAL 2 MONTH ) ) AND DATE( DATE_SUB( NOW() , INTERVAL 1 MONTH ) )')
            ->groupBy('beers.client_id')
            ->orderBy('total', 'desc')
            ->take(1)
            ->first();

        return view('pages.home', [
            'styles' => [
                'now' => $style01,
                'past' => $style02
            ],
            'clients' => [
                'now' => $client01,
                'past' => $client02
            ],
        ]);
    }
}
