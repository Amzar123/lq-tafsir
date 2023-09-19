<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Models\Ayah;
use App\Models\SavedAyah;
use App\Models\LikeTafsir;
use ApiResponse;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

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
        $ayah = new SavedAyah();

        // get request params
        $ayah->id = Str::uuid();
        $ayah->ayah_id = $request->id;
        $ayah->user_id = Str::uuid();
        $ayah->created_at = now()->format("Y-m-d H:i");
        $ayah->updated_at = now()->format("Y-m-d H:i");
        $ayah->save();

        return ApiResponse::success($ayah);
    }

    // function to get ayah by id
    public function getOneById(Request $request)
    {
        $ayah = Ayah::where('id', $request->id)->first();

        return ApiResponse::success($ayah);
    }

    // function to create like ayah 
    public function likeTafsir(Request $request)
    {

        $data = [
            'id' => Str::uuid(),
            'user_id' => Str::uuid(),
            'ayah_id' => $request->id,
            'created_at'=> now()->format("Y-m-d H:i"),
            'updated_at'=> now()->format("Y-m-d H:i"),
        ];

        $likedTafsir = LikeTafsir::create($data);

        return ApiResponse::success($likedTafsir);
    }

}