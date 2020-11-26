<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Product;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['name'];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
