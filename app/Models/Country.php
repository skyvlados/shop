<?php

namespace App\Models;

use App\Interfaces\UsingInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model implements UsingInterface
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'countries';
    protected $fillable = ['name', 'user_id', 'editor_id'];
    protected $casts = [
        'user_id' => 'integer',
        'editor_id' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id', 'id');
    }

    /** @todo после добавление товаров, добавить рилейшн на товары hasmany */
    public function using(): array
    {
        return [
            'manufacturers'=>'country_id' // country_id - это название поля в тоблице мануфактур с которым сравнивается id страны
        ];
    }

    public function manufacturers() // этот метод возвращает коллекцию мануфактур. Например все мануфактуры у которых айди стран Россия
    {
        return $this->hasMany(Manufacturer::class);
    }

    public function getUsingName(): string
    {
        return 'name';
    }
}
