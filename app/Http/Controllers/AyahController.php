<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Models\Ayah;
use App\Models\SavedAyah;
use ApiResponse;
use Illuminate\Support\Str;

class AyahController extends Controller
{
    public function getOneRandom(Request $request)
    {
        $randomRecord = Ayah::inRandomOrder()->first();

        return ApiResponse::success($randomRecord);
    }

    // store data to saved_ayah table
    public function saveAyah(Request $request)
    {
        $token = $request->session()->token();
 
    
        $ayah = new SavedAyah();

        // get request params
        $ayah->ayah_id = $request->id;
        dd("ini dia ", $ayah);

        $data = [
            'id' => Str::uuid(),
            'user_id' => Str::uuid(),
            // ayah_id from request params

            'created_at'=>now()->format("Y-m-d H:i"),
            'updated_at'=>now()->format("Y-m-d H:i"),
        ];

        $ayah->surah_id = $request->surah_id;
        $ayah->ayah_number = $request->ayah_number;
        $ayah->ayah_text = $request->ayah_text;
        $ayah->save();

        $token = csrf_token();

        return ApiResponse::success($ayah);
    }

    // function to get ayah by id
    public function getOneById(Request $request)
    {
        $ayah = Ayah::where('id', $request->id)->first();

        return ApiResponse::success($ayah);
    }

    // store data to saved_ayah table
    public function likeTafsir($id)
    {
        $token = $request->session()->token();
 
    
        $ayah = new SavedAyah();

        // get request params
        $ayah->ayah_id = $request->id;
        dd("ini dia ", $ayah);

        $data = [
            'id' => Str::uuid(),
            'user_id' => Str::uuid(),
            // ayah_id from request params

            'created_at'=>now()->format("Y-m-d H:i"),
            'updated_at'=>now()->format("Y-m-d H:i"),
        ];

        $ayah->surah_id = $request->surah_id;
        $ayah->ayah_number = $request->ayah_number;
        $ayah->ayah_text = $request->ayah_text;
        $ayah->save();

        $token = csrf_token();

        return ApiResponse::success($ayah);
    }

}