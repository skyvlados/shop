<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryStoreRequest;
use App\Http\Requests\CountryUpdateRequest;
use App\Interfaces\RepositoryInterface;
use App\Models\Country;
use App\Services\DependableService;
use Illuminate\Http\Request;

class CountryController extends Controller
{

    public function __construct(private RepositoryInterface $repository)
    {
    }

    public function index()
    {
        $allCountries = $this->repository->getAll();
        return view('countries.index',['countries'=>$allCountries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(CountryStoreRequest $request)
    {
        $country=$this->repository->store($request->user(),$request->validated());
        return redirect('/countries')->with('success','Страна '.$country->name.' создана!');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Country $country)
    {
        return view('countries.show', compact('country'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Country $country)
    {
        return view('countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryUpdateRequest $request, Country $country)
    {
        $this->repository->update($request->user(),$request->validated(), $country);
        return redirect('/countries')->with('success','Страна '.$country->name.' отредактирована!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Country $country, Request $request, DependableService $dependableService)
    {
        if ($dependableService->checkUsing($country)) {
            return redirect('/countries')
                ->with('error','Невозможно удалить страну '.$country->name.' из-за связи с '.$dependableService->getName().'!');
        }
        $this->repository->destroy($request->user(), $country);
        return redirect('/countries')->with('success','Страна '.$country->name.' удалена!');

    }
}
