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

    public function getList(Request $request)
    {

        // perform query from request
        $ayahId = $request->query('ayahId');
        $userId = $request->query('userId');
        $search = $request->query('search');


        // Start building your query
        $query = Tadabur::query();

        if ($ayahId) {
            $query->where('ayah_id', $ayahId);
        }

        if ($userId) {
            $query->where('user_id', $userId);
        }

        if ($search) {
            $query->where('content', 'like', '%' . $search . '%');
        }

        // Execute the query
        $tadaburs = $query->get();

        return ApiResponse::success($tadaburs);
    }

    // function get detail tadabur
    public function getDetail($id)
    {
        $tadabur = Tadabur::find($id);

        if (!$tadabur) {
            return ApiResponse::notFound("Tadabur not found");
        }

        return ApiResponse::success($tadabur);
    }
}