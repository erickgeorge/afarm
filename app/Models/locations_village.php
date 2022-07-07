<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locations_village extends Model
{
    protected $table = 'locations_village';

    use HasFactory;

    public function location_district(){
        return $this->belongsTo('App\Models\locations_district' , 'district_id');
    }
}
