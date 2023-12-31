<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use SoftDeletes;
    protected $guarded =[];

    public function category()
    {
        return $this->belongsTo('App\Models\category','category_id','id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\user','user_id','id');
    }


    public function sub_category()
    {
        return $this->belongsTo('App\Models\sub_category','sub_category_id','id')->withDefault();
    }

    public function brand()
    {
        return $this->belongsTo('App\Models\product_brand','brand_id','id')->withDefault();
    }
    public function unit()
    {
        return $this->belongsTo('App\Models\product_unit','unit_id','id')->withDefault();
    }

    // public function stock()
    // {
    //     return $this->belongsTo('App\Models\product_stock','id','product_id')->withDefault();
    // }

    public function warehouse()
    {
        return $this->belongsTo('App\Models\warehouse_product','id','product_id')->withDefault();
    }
    protected $casts = [
        'color' => 'array',
        'size' => 'array',
    ];

}
