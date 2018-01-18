<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Duong extends Model
{
    protected $fillable = ['name', 'huyen_id'];

    public function huyen()
    {
        return $this->belongsTo(Huyen::class);
    }
}
