<?php

namespace App;
use App\Category;
use App\User;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['user_id','name','slug','price','category_id','image','quantity','desc'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function order_detail()
    {
        return $this->hasMany(Order_Detail::class);
    }
}
