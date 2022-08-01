<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriptions_cropregionsubscriptionweight extends Model
{
    protected $table = 'subscriptions_cropregionsubscriptionweight';
    use HasFactory;

        public function location_region(){
        return $this->belongsTo('App\Models\locations_region' , 'region_id');
    }

        public function crop(){
        return $this->belongsTo('App\Models\crops_crop' , 'crop_id');
    }

}
