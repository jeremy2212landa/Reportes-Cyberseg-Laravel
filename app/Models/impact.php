<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class impact extends Model
{
    use HasFactory;

    public function cves(){
      //$user = user::find($this->cve_id)

      return $this->hasMany('App\Models\cve');
    }

}
