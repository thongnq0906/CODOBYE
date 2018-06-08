<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate_product extends Model
{
    protected $table = 'cate_products';
    protected $fillable = ['name', 'description'];
    public function Product()
    {
        return $this->hasMany(Product::class, 'cate_product_id');
    }
}
