<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Yeucaunha extends Model
{
    protected $table = "yeucaunha";
    protected $fillable = [
        'nguoi_dang',
        'loaiyeucau',
        'tam_tien',
        'loaibds',
        'tinh',
        'huyen',
        'phuong',
        'duong',
        'duan',
        'mua_gap',
        'kinh_doanh',
        'dau_tu',
        'de_o',
        'dien_tich',
        'dia_chi',
        'mat_tien',
        'duong_vao',
        'huong_nha',
        'tang',
        'phong_ngu',
        'phong_khach',
        'wc',
        'yeu_cau'];

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
