<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bulan extends Model
{
    use HasFactory;
    protected $table = 'mst_bulan';
    protected $guarded = [];
    public $timestamps = false;
}
