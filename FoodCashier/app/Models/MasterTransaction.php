<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTransaction extends Model
{
    use HasFactory;


    protected $fillable = [
        "master_nota",
        "namecashier",
        "subtotal",
        
    ];
}
