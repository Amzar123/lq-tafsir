<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Models\Surah;

class SurahController extends Controller
{
    public function get(Request $request)
    {
        // $result = Cache::remember('surahs', 604800, function () {
            

        //     dd($surah);

        //     return [
        //         $surah->get(),
        //         $surah->getCode()
        //     ];
        // });

        $surah = Surah::get();
        return response()->json([
            'data' => $surah,
            'code' => 200
        ])->header('Content-Type', 'application/json')->setMaxAge(86400);
    }
}