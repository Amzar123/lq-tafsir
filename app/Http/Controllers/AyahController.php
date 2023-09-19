<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Models\Ayah;

class AyahController extends Controller
{
    public function getOneRandom(Request $request)
    {
        $randomRecord = Ayah::inRandomOrder()->first();
        return response()->json([
            'data' => $randomRecord,
            'code' => 200
        ])->header('Content-Type', 'application/json')->setMaxAge(86400);
    }
}