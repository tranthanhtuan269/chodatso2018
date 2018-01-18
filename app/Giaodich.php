<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Giaodich extends Model
{
    protected $fillable = ['user', 'description', 'new', 'code', 'tin_id', 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
