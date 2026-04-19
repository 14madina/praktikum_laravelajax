<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function getData()
    {
        $path = storage_path('app/mahasiswa.json');

        if (!file_exists($path)) {
            return response()->json([
                'error' => 'File tidak ditemukan'
            ], 404);
        }

        $json = file_get_contents($path);
        $data = json_decode($json, true);

        return response()->json($data);
    }
}