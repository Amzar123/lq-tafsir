<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid; 

class Tadabur extends Model
{
    use HasFactory;

    // Specify the UUID column
    protected $casts = [
        'id' => 'string',
    ];
}
