<?php

namespace App\Interfaces;

use Illuminate\Contracts\Queue\QueueableEntity;

interface UsingInterface extends QueueableEntity
{
    public function using():array;

    public function getUsingName():string;
}
