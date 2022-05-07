<?php

namespace App\Services;

use App\Interfaces\UsingInterface;
use App\Models\Manufacturer;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class DependableService
{
    private array $names=[]; //хранть название мануфактур, товаров

    public function getName(): string
    {
        return implode(', ',$this->names);
    }

    /**
     * Сложности:
     * 1)модель может использоваться в нескольких таблицах (непонятно в каких названиях таблиц);
     * 2)неизвестно что удаляется (не факт что Страна)
     * $model это конкретная строчка из какой либо таблицы БД
     */
    public function checkUsing(UsingInterface $model): bool
    {
        $response=false;
        foreach ($model->using() as $relationKey => $value) { //$relationKey=manufacturers (название метода в модели Country)
            /** @var Collection $entities */
            $entities = $model->{$relationKey}; // =$entities=$model->manufacturers; $entities-колекция мануфактур связанных со строной $model->id
            if ($entities->isNotEmpty()) {
                $response=true;
                /** @var UsingInterface $entity */
                $entity=$entities->first();
                $this->names=array_merge($this->names,$entities->pluck($entity->getUsingName())->toArray());
            }
        }
        return $response;
    }
}
