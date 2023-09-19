<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use App\Models\Tadabur;
use ApiResponse;
use Illuminate\Support\Str;

class TadaburController extends Controller
{
    public function getOneById($id)
    {
        $tadabur = Tadabur::where('ayah_id', $id)->first();
        // handle not found
        if (!$tadabur) {
            return ApiResponse::notFound("tadabur not found");
        }

        return ApiResponse::success($tadabur);
    }

    // create tadabur 
    public function create(Request $request)
    {
        $tadabur = new Tadabur();

        // get request params
        $tadabur->id = Str::uuid();
        $tadabur->user_id = Str::uuid();
        $tadabur->ayah_id = $request->ayah_id;
        $tadabur->content = $request->content;
        $tadabur->created_at = now()->format("Y-m-d H:i");
        $tadabur->updated_at = now()->format("Y-m-d H:i");
        $tadabur->save();

        return ApiResponse::success($tadabur);
    }
}