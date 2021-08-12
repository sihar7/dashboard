<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pltp extends Model
{
    use HasFactory;

    protected $table = 'trn_pltp';
    protected $guarded = [];
    public $timestamps = false;
}
