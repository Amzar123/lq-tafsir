<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Illuminate\Support\Str;

class SurahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Specify the path to your CSV file
        // get csv ayah from resource
        $csvFile = storage_path('../resources/fixtures/surah_complete.csv'); // Adjust the path accordingly

        // Open and read the CSV file
        $csv = Reader::createFromPath($csvFile, 'r');
        $csv->setHeaderOffset(0); // Assuming the first row contains column headers

        // Iterate through each row and insert into the database
        foreach ($csv as $row) {
            DB::table('surahs')->insert([
                'id' => Str::uuid(),
                'order' => $row['id'],
                'title' => $row['title_in_arabic'],
                'transliteration' => $row['transliteration'],
                'translation_en' => $row['title_in_english'],
                'translation_id' => $row['title_in_indonesian'],
                'created_at'=>now()->format("Y-m-d H:i"),
                'updated_at'=>now()->format("Y-m-d H:i"),
            ]);
        }
    }
}
