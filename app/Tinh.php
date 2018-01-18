<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    //
    protected $fillable = ['name'];

    public function huyen(){
    	return $this->hasMany(Huyen::class);
    }
}
