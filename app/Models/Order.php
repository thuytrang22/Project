<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'infor_id',
        'payment_type_id',
        'status',
    ];

    public function infor()
    {
        return $this->belongsTo(Home::class);
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class);
    }

    public function orderMenus()
    {
        return $this->hasMany(OrderMenu::class);
    }

    public function bill()
    {
        return $this->hasOne(Bill::class);
    }
}
