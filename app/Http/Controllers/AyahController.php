<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Models\Ayah;
use ApiResponse;

class AyahController extends Controller
{
    public function getOneRandom(Request $request)
    {
        $randomRecord = Ayah::inRandomOrder()->first();

        return ApiResponse::success($randomRecord);
    }
}