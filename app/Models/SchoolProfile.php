<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Model;
 
class SchoolProfile extends Model
{
    protected $table = 'school_profile';
 
    protected $fillable = [
        'nama_kepsek',
        'label',
        'foto_profil',
        'konten_sambutan',
        'konten_sejarah',
        'visi',
        'misi',
    ];
 
    /**
     * Ambil data profil sekolah.
     * Kalau belum ada, buat baris kosong otomatis.
     */

}