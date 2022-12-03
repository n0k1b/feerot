<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class retailerDetails extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    protected $appends = ['thumbnail_image'];
    protected $base_url = 'https://admin.feerot.com/public/';

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
    public function getThumbnailImageAttribute()
    {
        return $this->base_url . $this->thumbnail_image;
    }

}
