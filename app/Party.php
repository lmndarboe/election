<?php

namespace App;

use Illuminate\Support\Facades\Storage;


use Illuminate\Database\Eloquent\Model;

class Party extends Model
{   

    protected $fillable = [
        'name' ,'address','flag_bearer','flag_color','logo'
    ];

    public function candidates(){
    	return $this->hasMany(Candidate::class);
    }

    public function image()
    {
        //$this->logo;
        return $this->logo == null ? asset('img/face.png') : Storage::get($this->logo);
    }
}
