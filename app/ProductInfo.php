<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductInfo extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'product_id',
        'amount'
    ];


    public function thisproduct()
    {
       
       return $this->hasOne('App\Product', 'product_id', 'id');
    }
}
