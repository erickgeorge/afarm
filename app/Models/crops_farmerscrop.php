<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crops_farmerscrop extends Model
{
    
    protected $table = 'crops_farmerscrop';

    use HasFactory;

    public function crop(){
        return $this->belongsTo('App\Models\crops_crop' , 'crop_id');
    }

    public function cropunit(){
        return $this->belongsTo('App\Models\crops_cropunit' , 'crop_unit_id');
    }

    public function farmer(){
        return $this->belongsTo('App\Models\users_farmer' , 'farmer_id');
    }


}
