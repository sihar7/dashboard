<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telemarketing extends Model
{
    use HasFactory;

    protected $table = 'mst_telemarketing';
    protected $guarded = [];
    public $timestamps = false;
}
