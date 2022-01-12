<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterstock extends Model
{
    use HasFactory;

    protected $fillable = [
        "nameitem",
        "descriptionitem",
        "price",
        "qty",
        "image",
        "path"
    ];



    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
