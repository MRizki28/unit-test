<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function getAllData()
    {
        $data = MahasiswaModel::skip(0)->take(10)->get();
        if ($data->isEmpty()) {
            return response()->json([
                'message' => 'data not found'
            ], 404);
        } else {
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], 200);
        }
    }

    public function createData(Request $request)
    {
        try {
            $data = MahasiswaModel::create($request->all());
            return response()->json([
                'message' => 'success',
                'data' => $data
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'errors' => $th->getMessage()
            ]);
        }
    }
}
