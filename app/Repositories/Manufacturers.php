<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Manufacturer;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Manufacturers implements RepositoryInterface
{
    public function getAll():Collection
    {
        return Manufacturer::query()
            ->orderBy('id')
            ->get();
    }

    public function store(User $user, array $fields): Model
    {
        $manufacturer=new Manufacturer();
        $manufacturer->fill($fields);
        $manufacturer->user()->associate($user);
        $manufacturer->save();
        return $manufacturer;
    }

    public function update(User $user, array $fields, Manufacturer|Model $model): void
    {
        $model->fill($fields);
        $model->editor()->associate($user);
        $model->save();
    }

    public function destroy(User $user, Manufacturer|Model $model): void
    {
        $model->editor()->associate($user);
        $model->save();
        $model->delete();
    }
}
