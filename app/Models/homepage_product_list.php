<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homepage_product_list extends Model
{
    protected $guarded =[];
    public function retailer()
    {
        return $this->belongsTo('App\Models\retailerDetails','retailer_id','id');
    }
    public function homepage_section()
    {
        return $this->belongsTo('App\Models\homepage_section','homepage_section_id','id');
    }

}
