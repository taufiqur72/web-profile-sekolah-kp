<?php

namespace App\Http\Controllers;

use App\Models\Alumni;
use Illuminate\Http\Request;

class AlumniController extends Controller
{
    public function index()
    {
        // Mengambil semua data dan mengirimkannya ke view
        $alumnis = Alumni::all();
        return view('alumni.index', compact('alumnis'));
    }

    public function show($id)
    {
        // Mengambil data spesifik berdasarkan ID
        $alumni = Alumni::with('galleries')->findOrFail($id);
        return view('alumni.detail', compact('alumni'));
    }
}