<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinBDS extends Model
{
    protected $table = "tinbdss";
    protected $fillable = ['tieu_de', 'nguoi_dang', 'loaiyeucau', 'mo_ta','images','loaibds','tinh','huyen','phuong','duong','duan','gia','dien_tich','dia_chi','mat_tien','duong_vao','huong_nha','tang','phong_ngu','phong_khach','wc','noi_that','active','vip', 'view', 'lat', 'lng', 'numcall'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function loaibds()
    {
        return $this->belongsTo(Loaibds::class);
    }

    public function tinh()
    {
        return $this->belongsTo(Tinh::class);
    }

    public function huyen(){
    	return $this->belongsTo(Huyen::class);
    }

    public function duong(){
    	return $this->belongsTo(Duong::class);
    }

    public function phuong(){
    	return $this->belongsTo(Pho::class);
    }

    public function duan(){
    	return $this->belongsTo(Duan::class);
    }

    public function huong(){
    	return $this->belongsTo(Pho::class);
    }
}
