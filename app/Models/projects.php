<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class projects extends Model
{
    use HasFactory;


    //Relacion Muchos a muchos
    public function cves(){
      return $this->belongsToMany('App\Models\cve');
    }
}
