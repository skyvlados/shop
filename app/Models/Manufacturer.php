<?php

namespace App\Models;

use App\Interfaces\UsingInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model implements UsingInterface
{
    use HasFactory;

    protected $table = 'manufacturers';
    protected $fillable = ['name','country_id','user_id','editor_id'];
    protected $casts = [
        'country_id' => 'integer'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }

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
        return [];
    }

    public function getUsingName(): string
    {
        return 'name';
    }
}
