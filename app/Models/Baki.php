<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Baki extends Model
{
    use HasFactory;

    protected $connection = 'mysql2';

    protected $table = 'baki';

    protected $fillable = [
        'budget_id',
        'tahun',
        'kod_budget',
        'amaun'
    ];
}
