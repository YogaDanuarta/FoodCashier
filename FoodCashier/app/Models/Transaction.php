<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;


    protected $fillable = [
        "status",
      
    ];


    public function stock()
    {
        return $this->hasMany(Masterstock::class);
    }
}
