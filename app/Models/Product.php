<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $table = 'products';
     protected $fillable = ['name', 'title', 'cate_product_id'];

    public function Cate_product()
    {

        return $this->belongsTo('App\Models\Cate_product', 'cate_product_id', 'id');
    }

    public function BillDetail()
    {
        return $this->hasMany(BillDetail::class, 'product_id');
    }
}
