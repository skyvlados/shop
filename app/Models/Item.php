<?php

namespace App\Models;

use App\Interfaces\UsingInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model implements UsingInterface
{
    use HasFactory;

    protected $table = 'items';
    protected $fillable = ['name','price','manufacturer_id','user_id','editor_id'];
    protected $casts = [
        'country_id' => 'integer'
    ];

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class, 'manufacturer_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'editor_id', 'id');
    }

    public function using(): array
    {
        return [];
    }

    public function getUsingName(): string
    {
        return 'name';
    }
}
