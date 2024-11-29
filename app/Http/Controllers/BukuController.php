<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $buku = Buku::orderBy("id", "desc")->get();

        return response()->json([
            "status" => true,
            "message" => "Success retrieve all data",
            "data" => $buku
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $buku = new Buku;

        $rules = [
            "judul" => "required",
            "pengarang" => "required",
            "tanggal" => "required|date"
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                "status" => false,
                "message" => "Fail adding data",
                "data" => $validator->errors()
            ], 404);
        }

        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->tanggal = $request->tanggal;

        $post = $buku->save();

        return response()->json([
            "status" => true,
            "message" => "Success adding data"
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::find($id);

        if($buku){
            return response()->json([
                "status" => true,
                "message" => "Success retrieve data by id",
                "data" => $buku
            ], 200);
        }else{
            return response()->json([
                "status" => false,
                "message" => "Fail retrieve data by id"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $buku = Buku::find($id);

        if(empty($buku)){
            return response()->json([
                "status" => false,
                "message" => "Id not found"
            ], 404);
        }

        $rules = [
            "judul" => "required",
            "pengarang" => "required",
            "tanggal" => "required|date"
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return response()->json([
                "status" => false,
                "message" => "Fail update data",
                "data" => $validator->errors()
            ], 404);
        }

        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->tanggal = $request->tanggal;

        $post = $buku->save();

        return response()->json([
            "status" => true,
            "message" => "Success update data"
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $buku = Buku::find($id);

        if(empty($buku)){
            return response()->json([
                "status" => false,
                "message" => "Id not found"
            ], 404);
        }
        
        $post = $buku->delete();

        return response()->json([
            "status" => true,
            "message" => "Success delete data"
        ], 200);
    }
}
