<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage; // Add this import if you want to read the CSV file from storage
use Illuminate\Support\Collection;

class Surah extends Model
{
    /**
     * Define the table name (optional).
     */
    protected $table = 'surah';

    /**
     * Define the columns and their data types.
     *
     * @var array
     */
    protected $fillable = [
        'id', // Assuming this is the primary key, adjust accordingly
        'title',
        'transliteration',
    ];

    /**
     * A surah has many ayah(s).
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ayahs()
    {
        return $this->hasMany(Ayah::class);
    }

    /**
     * Process data from CSV file.
     *
     * @return array
     */
    public static function getRows()
    {
        // Assuming you have stored the CSV file in your Laravel project's "storage/app" directory
        // If you want to store it elsewhere or fetch it from a different location, adjust the path accordingly
        $csvPath = storage_path('app/surah.csv');

        $records = [];

        if (file_exists($csvPath)) {
            $file = fopen($csvPath, 'r');

            if ($file) {
                while (($data = fgetcsv($file)) !== false) {
                    $records[] = [
                        'id' => $data[0],
                        'title' => $data[1],
                        'transliteration' => $data[2],
                        'translation_en' => $data[3],
                    ];
                }

                fclose($file);
            }
        }

        return $records;
    }
}
