<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use Sortable;
    // use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];


    public $sortable = ['name', 'price'];

    protected $fillable = [
        'name',
        'description',
    ];

        //get products  

    public function productsCat()
    {
        return $this->hasMany('App\Product', 'category_id' , 'id');
    }

    protected static function boot() {
        parent::boot();

    static::deleting(function($category) {
        $category->productsCat()->delete();
    });
}
}
