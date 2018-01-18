<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Huyen extends Model
{
    protected $fillable = ['name', 'tinh_id'];

    public function tinh()
    {
        return $this->belongsTo(Tinh::class);
    }

    public function duong(){
    	return $this->hasMany(Duong::class);
    }

    public function pho(){
    	return $this->hasMany(Pho::class);
    }
}
