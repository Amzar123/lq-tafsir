<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use Illuminate\Support\Str;

class AyahSeeder extends Seeder
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
        $csvFile = storage_path('../resources/fixtures/ayah_master.csv'); // Adjust the path accordingly

        // Open and read the CSV file
        $csv = Reader::createFromPath($csvFile, 'r');
        $csv->setHeaderOffset(0); // Assuming the first row contains column headers

        // Iterate through each row and insert into the database
        foreach ($csv as $row) {
            DB::table('ayahs')->insert([
                'id' => Str::uuid(),
                'surah_id' => $row['surah_id'],
                'content' => $row['content'],
                'translate_in' => $row['translate_id'],
                'translate_en' => $row['translate_en'],
                'number' => $row['number'],
                'juz' => $row['juz'],
            ]);
        }
    }
}
