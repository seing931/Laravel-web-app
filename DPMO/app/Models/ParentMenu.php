<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentMenu extends Model
{
    use HasFactory;

    protected $table = 'parentmenu';
    protected $primaryKey = 'parentid';
    public $timestamps = false;

    public function menus()
    {
        return $this->hasMany(Menu::class, 'parentid')->orderBy('orderno');
    }
}
