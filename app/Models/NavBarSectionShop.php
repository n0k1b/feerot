<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavBarSectionShop extends Model
{
    //use HasFactory;
    protected $guarded = [];
    public function retailer()
    {
        return $this->belongsTo(retailerDetails::class, 'retailer_id', 'id');
    }
}
