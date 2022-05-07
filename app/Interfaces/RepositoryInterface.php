<?php

namespace App\Interfaces;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function getAll():Collection;

    public function store(User $user, array $fields):Model;

    public function update(User $user, array $fields, Model $model):void;

    public function destroy(User $user, Model $model):void;
}
