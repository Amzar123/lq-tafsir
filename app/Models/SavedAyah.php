<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedAyah extends Model
{
    use HasFactory;

    /**
     * Define the table name (optional).
     */
    protected $table = 'saved_ayah';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'ayah_id',
        'created_at',
        'updated_at',
    ];
}
