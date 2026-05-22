<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Tambahkan baris ini untuk memaksa Laravel membaca tabel 'contact'
    protected $table = 'contact';

    // Definisikan atribut yang boleh diisi (Mass Assignment)
    protected $fillable = [
        'address',
        'email',
        'phone',
    ];
}