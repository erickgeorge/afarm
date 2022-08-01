<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crops_crop extends Model
{
    protected $table = 'crops_crop';

    use HasFactory;

        public function cropcategory(){
        return $this->belongsTo('App\Models\crops_cropcategory' , 'crop_category_id');
    }

        public function measurementcategory(){
        return $this->belongsTo('App\Models\crops_measurementcategory' , 'measurement_category_id');
    }

}
