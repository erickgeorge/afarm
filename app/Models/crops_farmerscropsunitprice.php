<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class crops_farmerscropsunitprice extends Model
{
        protected $table = 'crops_farmerscropsunitprice';
        use HasFactory;

         public function cropunit(){
        return $this->belongsTo('App\Models\crops_cropunit' , 'crop_unit_id');
    }
}
