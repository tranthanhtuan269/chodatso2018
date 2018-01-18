<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Loaibds;
use App\Tinh;

class KhuvucController extends Controller
{
    public function show($id)
    {
        $tinmns = \DB::table('tinbdss')
                    ->join('duongs', 'duongs.id', '=', 'tinbdss.duong')
                    ->join('phos', 'phos.id', '=', 'tinbdss.phuong')
                    ->join('huyens', 'huyens.id', '=', 'tinbdss.huyen')
                    ->join('tinhs', 'tinhs.id', '=', 'tinbdss.tinh')
                    ->join('users', 'users.id', '=', 'tinbdss.nguoi_dang')
                    ->select('tinbdss.*', 'tinbdss.id as tin_id', 'users.*', 'duongs.name as ten_duong', 'phos.name as ten_pho', 'huyens.name as ten_huyen', 'tinhs.name as ten_tinh')
                    ->where('tinhs.id', '=', $id)
                    ->where('tinbdss.active', '=', 1)
                    ->where('tinbdss.da_ban', '=', 0)
                    ->paginate(8);

        $tinh = Tinh::find($id);

        if($tinh == null){
        	return view('errors.404');
        }


        return view('khuvuc.index')->withtinmns($tinmns)->withkhuvuc($tinh->name);
    }

    public function loaitin($id)
    {
        $tinmns = \DB::table('tinbdss')
                    ->join('duongs', 'duongs.id', '=', 'tinbdss.duong')
                    ->join('phos', 'phos.id', '=', 'tinbdss.phuong')
                    ->join('huyens', 'huyens.id', '=', 'tinbdss.huyen')
                    ->join('tinhs', 'tinhs.id', '=', 'tinbdss.tinh')
                    ->join('users', 'users.id', '=', 'tinbdss.nguoi_dang')
                    ->select('tinbdss.*', 'tinbdss.id as tin_id', 'users.*', 'duongs.name as ten_duong', 'phos.name as ten_pho', 'huyens.name as ten_huyen', 'tinhs.name as ten_tinh')
                    ->where('tinbdss.loaibds', '=', $id)
                    ->paginate(8);

        $loaibds = Loaibds::find($id);

        if($loaibds == null){
            return view('errors.404');
        }


        return view('khuvuc.index2')->withtinmns($tinmns)->withLoaibds($loaibds->name);
    }
}
