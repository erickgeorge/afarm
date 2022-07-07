<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locations_district extends Model
{
    protected $table = 'locations_district';
    use HasFactory;

    public function location_region(){
        return $this->belongsTo('App\Models\locations_region' , 'region_id');
    }

}
