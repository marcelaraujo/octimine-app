<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Repositories\Contracts\BeerRepositoryInterface;
use App\Repositories\Contracts\TypeRepositoryInterface;
use App\Repositories\Contracts\ClientRepositoryInterface;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class BeersController extends Controller
{

    /**
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:64',
        'description' => 'required|max:1024',
        'client_id' => 'required',
        'type_id' => 'required',
    ];

    /**
     * @var BeerRepositoryInterface
     */
    protected $beerRepository;

    /**
     * @var TypeRepositoryInterface
     */
    protected $typeRepository;

    /**
     * @var ClientRepositoryInterface
     */
    protected $clientRepository;

    /**
     * @param BeerRepositoryInterface $beerRepository
     * @param TypeRepositoryInterface $typeRepository
     * @param ClientRepositoryInterface $clientRepository
     */
    public function __construct(BeerRepositoryInterface $beerRepository, TypeRepositoryInterface $typeRepository, ClientRepositoryInterface $clientRepository) {
        $this->beerRepository = $beerRepository;
        $this->typeRepository = $typeRepository;
        $this->clientRepository = $clientRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('pages.beers.index', [
            'beers' => $this->beerRepository->paginate(env('APP_PAGINATION_PER_PAGE', 20)),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @param $request Request
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('pages.beers.create', [
            'types' => $this->typeRepository->findAll(),
            'clients' => $this->clientRepository->findAll(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $request Request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, $this->rules);

        if ($validator->passes())
        {
            $this->beerRepository->create($input);

            return Redirect::route('beers.index');
        }

        return Redirect::route('beers.create')->withInput()->withErrors($validator);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit($id)
    {
        return view('pages.beers.edit', [
            'beer' => $this->beerRepository->findById($id),
            'types' => $this->typeRepository->findAll(),
            'clients' => $this->clientRepository->findAll(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @param $request Request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, $this->rules);

        if ($validator->passes())
        {
            $this->beerRepository->update($id, $input);

            return Redirect::route('beers.index');
        }

        return Redirect::route('beers.update', ['id' => $id])->withInput()->withErrors($validator);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->beerRepository->destroy($id);

        return Redirect::route('beers.index');
    }
}
