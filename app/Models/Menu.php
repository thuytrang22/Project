<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'menus';
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'public',
        'detail',
        'id_category',
        'price'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class);
    }

    public function orderMenu()
    {
        return $this->belongsTo(OrderMenu::class);
    }
}
