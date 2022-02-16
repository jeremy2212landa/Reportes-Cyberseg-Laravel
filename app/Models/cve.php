<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cve extends Model
{
    use HasFactory;

    //Relacion uno a uno
    public function impact(){
      //$impact = impact::where('cve_id', $this->id)->first();

      return $this->hasOne('App\Models\impact');
    }



    //Relacion muchos a muchos
    public function projects(){
        return $this->belongsToMany('App\Models\projects');
    }
}
