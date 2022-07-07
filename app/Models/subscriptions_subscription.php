<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriptions_subscription extends Model
{   
    protected $table = 'subscriptions_subscription';

    use HasFactory;

    public function buyers(){
        return $this->belongsTo('App\Models\users_buyer' , 'buyer_id');
    }

    public function pachages(){
        return $this->belongsTo('App\Models\subscriptions_package' , 'package_id');
    }
}
