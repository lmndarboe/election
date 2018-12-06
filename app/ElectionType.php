<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElectionType extends Model
{
    public function elections(){
    	return $this->hasMany(Election::class);
    }
}
