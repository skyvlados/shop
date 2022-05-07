<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManufacturerStoreRequest;
use App\Http\Requests\ManufacturerUpdateRequest;
use App\Interfaces\RepositoryInterface;
use App\Models\Country;
use App\Models\Manufacturer;
use App\Repositories\Countries;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{

    public function __construct(private RepositoryInterface $repository)
    {
    }

    public function index()
    {
        $allManufacturers=$this->repository->getAll();
        return view('manufacturers.index',['manufacturers'=>$allManufacturers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Countries $repository)
    {
        $allCountries=$repository->getAll();
        return view('manufacturers.create',['countries'=>$allCountries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(ManufacturerStoreRequest $request)
    {
        $manufacturer=$this->repository->store($request->user(),$request->validated());
        return redirect('/manufacturers')->with('success','Производитель '.$manufacturer->name.' создан!');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show($id)
    {
        $manufacturer = Manufacturer::query()->find($id);
        $country=Country::query()->find($manufacturer->country_id);
        return view('manufacturers.show',['manufacturer'=>$manufacturer, 'country'=>$country]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Manufacturer $manufacturer)
    {
        $countries=Country::query()
            ->orderBy('id')
            ->get();
        $country=Country::query()->find($manufacturer->country_id);
        return view('manufacturers.edit',['manufacturer'=>$manufacturer, 'countryDefault'=>$country,'countries'=>$countries]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ManufacturerUpdateRequest $request, Manufacturer $manufacturer)
    {
        $this->repository->update($request->user(),$request->validated(),$manufacturer);
        return redirect('/manufacturers')->with('success','Производитель '.$manufacturer->name.' отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    /** @todo добавить проверку на применяемость мануфактур checkUsing в товарах, после добавления товаров */
    public function destroy(Manufacturer $manufacturer, Request $request)
    {
        $this->repository->destroy( $request->user(), $manufacturer);
        return redirect('/manufacturers')->with('success','Производитель '.$manufacturer->name.' удалена!');

    }
}
