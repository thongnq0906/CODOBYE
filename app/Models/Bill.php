<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    public function BillDetail()
    {
        return $this->hasMany(BillDetail::class, 'bill_id');
    }
}
