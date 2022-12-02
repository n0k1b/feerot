<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavBarSection extends Model
{
    //use HasFactory;
    protected $guarded = [];
    public function shop()
    {
        return $this->hasMany('App\Models\nav_bar_section_shop', 'nav_bar_section_id', 'id')->where('status', 1);
    }
}
