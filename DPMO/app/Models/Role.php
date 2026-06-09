<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roleacc';

    protected $fillable = [
        'rolecode',
        'roledesc',
        'config',
        'dept',
        'role',
        'mguser',
        'log'
    ];
}
