<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable=[
        'name','description','price','img_path','category_id','stock'
    ];

    public function category()
    {
        return $this->belongsTo('\App\Category');
    }
}
