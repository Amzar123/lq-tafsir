<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Add this import if you want to read the CSV file from storage
use Illuminate\Support\Collection;
use Ramsey\Uuid\Uuid; 

class Ayah extends Model
{
    /**
     * Define the table name (optional).
     */
    protected $table = 'ayahs';

    /**
     * Define the columns and their data types.
     *
     * @var array
     */
    protected $fillable = [
        'id', // Assuming this is the primary key, adjust accordingly
        'surah_id',
        'content',
        'translate_en',
        'translate_id',
        'number',
        'juz',
    ];

     // Specify the UUID column
     protected $casts = [
        'id' => 'string',
    ];
}
