<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class AutoCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'prefix',
        'last_number',
    ];
}
