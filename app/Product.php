<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $fillable = [
        'category_id',
        'product_name',
        'description',
        'image',
        'price'
    ];

   
    /**
     * Get the category that the product belongs to.
     */
    public function category()
    {
       
       return $this->belongsTo('App\Category', 'category_id');
    }

    public function infos()
    {       
       return $this->hasOne('App\ProductInfo');
    }

}
