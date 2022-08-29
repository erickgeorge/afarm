<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users_farmer extends Model
{

    protected $table = 'users_farmer';

    use HasFactory;

    public function farmer(){
        return $this->belongsTo('App\Models\users_villagechairman' , 'village_chairman_id');
    }

    public function location(){
        return $this->belongsTo('App\Models\locations_village' , 'village_id');
    }


    public function users(){
        return $this->belongsTo('App\Models\users_user' , 'user_id');
    }


    


}
