<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavBarSection extends Model
{
    //use HasFactory;
    protected $guarded = [];
    public function shop()
    {
        return $this->hasMany(NavBarSectionShop::class, 'nav_bar_section_id', 'id')->where('status', 1);
    }
}
