<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'mst_role';
    protected $guarded = [];

    public function users()
    {
        return $this->belongsToMany(User::class, 'mst_role_user');
    }
}
