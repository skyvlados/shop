<?php

namespace App\Repositories;

use App\Interfaces\RepositoryInterface;
use App\Models\Item;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Items implements RepositoryInterface
{
    public function getAll():Collection
    {
        return Item::query()
            ->orderBy('id')
            ->get();
    }

    public function store(User $user, array $fields): Model
    {
        $item=new Item();
        $item->fill($fields);
        $item->user()->associate($user);
        $item->save();
        return $item;
    }

    public function update(User $user, array $fields, Item|Model $model): void
    {
        $model->fill($fields);
        $model->editor()->associate($user);
        $model->save();
    }

    public function destroy(User $user, Item|Model $model): void
    {
        $model->editor()->associate($user);
        $model->save();
        $model->delete();
    }
}
