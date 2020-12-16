<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Order_Detail;

class Order extends Model
{

    protected $dates = ['order_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_detail()
    {
        return $this->belongsTo(Order_Detail::class);
    }

}
