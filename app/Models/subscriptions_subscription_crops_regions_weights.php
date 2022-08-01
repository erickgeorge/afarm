<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriptions_subscription_crops_regions_weights extends Model
{
    protected $table = 'subscriptions_subscription_crops_regions_weights';
    use HasFactory;

        public function weight(){
        return $this->belongsTo('App\Models\subscriptions_cropregionsubscriptionweight' , 'cropregionsubscriptionweight_id');
    }
}
