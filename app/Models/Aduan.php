<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;

    // Maklumkan kepada model Aduan supaya hubungi table bernama aduan.
    // Jika tidak letakkan info ini, maka Aduan akan cuba cari table aduans (plural kepada model Aduan)
    protected $table = 'aduan';
}
