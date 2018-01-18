<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Quantam extends Model
{
    protected $table = "quantam";
    protected $fillable = ['user', 'email', 'tinh', 'huyen', 'phuong', 'duong', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tinh()
    {
        return $this->belongsTo(Tinh::class);
    }
    
    public function huyen()
    {
        return $this->belongsTo(Huyen::class);
    }
    
    public function phuong()
    {
        return $this->belongsTo(Pho::class);
    }
    
    public function duong()
    {
        return $this->belongsTo(Duong::class);
    }
}
