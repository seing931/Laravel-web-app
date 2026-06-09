<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'id';
    protected $fillable = ['parentid', 'menu', 'icon', 'url', 'orderno'];
    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo(ParentMenu::class, 'parentid');
    }
}
