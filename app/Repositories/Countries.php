<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Countries implements RepositoryInterface
{
    public function getAll():Collection
    {
        return Country::query()
            ->orderBy('id')
            ->get();
    }

    public function store(User $user, array $fields): Model
    {
        $country=new Country();
        $country->fill($fields);
        $country->user()->associate($user);
        $country->save();
        return $country;
    }

    public function update(User $user, array $fields, Country|Model $model): void
    {
        $model->fill($fields);
        $model->editor()->associate($user);
        $model->save();
    }

    public function destroy(User $user, Country|Model $model): void
    {
        $model->editor()->associate($user);
        $model->save();
        $model->delete();
    }
}
