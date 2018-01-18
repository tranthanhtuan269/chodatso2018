<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Huyen;
use App\Tinh;
use Session;

class HuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $huyens = Huyen::all();

        return view('huyens.index')->withHuyens($huyens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tinhs = Tinh::pluck('name', 'id');
        //dd($tinh);
        return view('huyens.create', compact('tinhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:huyens|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('huyen/create')
                    ->withErrors($validator)
                    ->withInput();
        }


        $input = $request->all();

        Huyen::create($input);

        \Session::flash('flash_message', 'Huyện đã được tạo thành công!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $huyen = Huyen::find($id);
        
        if($huong === null){
            return view('errors.404');
        }

        //dd($huyen);

        return view('huyens.show')->withHuyen($huyen);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $huyen = Huyen::find($id);
        
        if($huong === null){
            return view('errors.404');
        }

        $tinhs = Tinh::pluck('name', 'id');

        if (is_null($huyen))
        {
            return Redirect::route('huyen.index');
        }

        return \View::make('huyens.edit', compact('huyen', 'tinhs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $input = $request->all();

        $huyen = Huyen::find($id);
        
        if($huong === null){
            return view('errors.404');
        }

        $huyen->update($input);

        \Session::flash('flash_message', 'Huyện đã được sửa thành công!');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $huyen = Huyen::find($id);

        if (is_null($huyen))
        {
            Session::flash('flash_message', 'Không tìm thấy Huyện bạn muốn xóa!');
            return Redirect::route('huyen.index');
        }

        $huyen->delete();

        Session::flash('flash_message', 'Huyện đã được xóa thành công!');

        return redirect()->route('huyen.index');
    }

    public function getHuyen($id){
        $huyens = \DB::table('huyens')
                    ->where('huyens.tinh_id', '=', $id)
                    ->get();   
        $html = "";
        $html .= '<option value="0">--Chọn Quận / Huyện--</option>';
        foreach ($huyens as $huyen) {
            $html .= '<option value="'.$huyen->id.'">'.$huyen->name.'</option>';
        }
        return $html;
    }

    public function getPhuong($id){
        $phos = \DB::table('phos')
                    ->where('phos.huyen_id', '=', $id)
                    ->get();   
        $html = "";
        $html .= '<option value="0">--Chọn Phường / Xã --</option>';
        foreach ($phos as $pho) {
            $html .= '<option value="'.$pho->id.'">'.$pho->name.'</option>';
        }
        return $html;
    }

    public function getDuong($id){
        $duongs = \DB::table('duongs')
                    ->where('duongs.huyen_id', '=', $id)
                    ->get();   
        $html = "";
        $html .= '<option value="0">--Chọn Đường --</option>';
        foreach ($duongs as $duong) {
            $html .= '<option value="'.$duong->id.'">'.$duong->name.'</option>';
        }
        return $html;
    }

    public function getDuan($id){
        $duans = \DB::table('duans')
                    ->where('duans.huyen_id', '=', $id)
                    ->get();   
        $html = "";
        $html .= '<option value="0">--Chọn Dự án--</option>';
        foreach ($duans as $duan) {
            $html .= '<option value="'.$duan->id.'">'.$duan->name.'</option>';
        }
        return $html;
    }
}
