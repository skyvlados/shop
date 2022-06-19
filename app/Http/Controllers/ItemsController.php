<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemsStoreRequest;
use App\Http\Requests\ItemsUpdateRequest;
use App\Interfaces\RepositoryInterface;
use App\Models\Item;
use App\Models\Manufacturer;
use App\Repositories\Manufacturers;
use Illuminate\Http\Request;

class ItemsController extends Controller
{

    public function __construct(private RepositoryInterface $repository)
    {
    }

    public function index()
    {
        $allItems=$this->repository->getAll();
        return view('items.index',['items'=>$allItems]);
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create(Manufacturers $repository)
    {
        $allManufacturers=$repository->getAll();
        return view('items.create',['manufacturers'=>$allManufacturers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     */
    public function store(ItemsStoreRequest $request)
    {
        $item=$this->repository->store($request->user(),$request->validated());
        return redirect('/items')->with('success','Товар '.$item->name.' создан!');
    }

    /**
     * Display the specified resource.
     *
     */
    public function show(Item $item)
    {
        return view('items.show',['item'=>$item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit(Item $item, Manufacturers $manufacturers)
    {
        return view('items.edit',['item'=>$item,'manufacturers'=>$manufacturers->getAll()]);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(ItemsUpdateRequest $request, Item $item)
    {
        $this->repository->update($request->user(),$request->validated(),$item);
        return redirect('/items')->with('success','Товар '.$item->name.' отредактирован!');
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Item $item, Request $request)
    {
        $this->repository->destroy( $request->user(), $item);
        return redirect('/items')->with('success','Товар '.$item->name.' удален!');

    }
}
