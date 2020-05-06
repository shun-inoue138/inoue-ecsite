<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'product_id','user_id', 'item_id', 'quantity'
    ];
    public function product()
    {
        return $this->belongsTo('\App\Product');
    }
}
