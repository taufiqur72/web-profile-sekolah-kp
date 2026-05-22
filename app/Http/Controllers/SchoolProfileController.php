<?php
 
namespace App\Http\Controllers;
 
use App\Models\SchoolProfile;
 
class SchoolProfileController extends Controller
{
    public function sambutan()
    {
        // Ambil data pertama di database, jika kosong ganti dengan objek baru kosong (mencegah error di Blade)
        $profile = SchoolProfile::first() ?? new SchoolProfile();
        
        return view('profil.sambutan', compact('profile'));
    }
 
    public function sejarah()
    {
        // Ambil data pertama di database, jika kosong ganti dengan objek baru kosong
        $profile = SchoolProfile::first() ?? new SchoolProfile();
        
        return view('profil.sejarah', compact('profile'));
    }
 
    public function visiMisi()
    {
        // Ambil data pertama di database, jika kosong ganti dengan objek baru kosong
        $profile = SchoolProfile::first() ?? new SchoolProfile();
        
        return view('profil.visi-misi', compact('profile'));
    }
}