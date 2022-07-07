<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $fillable = [
        'tahun',
        'kod_budget',
        'amaun'
    ];

    public function baki()
    {
        return $this->hasOne(Baki::class);
    }
}
