<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisAsuransi extends Model
{
    use HasFactory;
    protected $table = 'mst_jns_asuransi';
    protected $guarded = [];
    public $timestamps = false;
}
