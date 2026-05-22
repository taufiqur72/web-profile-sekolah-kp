<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// Panggil Model yang mengarah ke tabel database kontak Anda
use App\Models\Contact; 

class ContactController extends Controller
{
    /**
     * Menampilkan halaman informasi kontak statis dari database
     */
    public function index()
    {
        // Ambil data pertama dari database
        $kontak = Contact::first(); 

        // Kirim variabel $kontak ke file blade kontak.blade.php
        return view('kontak.kontak', compact('kontak'));
    }
}