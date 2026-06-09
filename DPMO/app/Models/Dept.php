<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Dept extends Model
{
    use HasFactory;

    protected $table = 'sysdept';

    protected $fillable = [
        'deptcode',
        'deptdesc'
    ];
}
