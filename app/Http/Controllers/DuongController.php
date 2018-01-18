<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Huyen;
use App\Duong;
use Session;


class DuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duongs = Duong::all();

        return view('duongs.index')->withDuongs($duongs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $huyens = Huyen::pluck('name', 'id');
        //dd($tinh);
        return view('duongs.create', compact('huyens'));
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
            'name' => 'required|unique:duongs|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('duong/create')
                    ->withErrors($validator)
                    ->withInput();
        }


        $input = $request->all();

        Duong::create($input);

        \Session::flash('flash_message', 'Đường đã được tạo thành công!');

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
        $duong = Duong::findOrFail($id);
        
        if($duong === null){
            return view('errors.404');
        }

        return view('duongs.show')->withDuong($duong);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $duong = Duong::find($id);
        
        if($duong === null){
            return view('errors.404');
        }

        $huyens = Huyen::pluck('name', 'id');

        if (is_null($duong))
        {
            return Redirect::route('duong.index');
        }

        return \View::make('duongs.edit', compact('duong', 'huyens'));
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

        $duong = Duong::find($id);
        
        if($duong === null){
            return view('errors.404');
        }

        $duong->update($input);

        \Session::flash('flash_message', 'Đường đã được sửa thành công!');

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
        $duong = Duong::find($id);

        if (is_null($duong))
        {
            Session::flash('flash_message', 'Không tìm thấy Đường bạn muốn xóa!');
            return Redirect::route('duong.index');
        }

        $duong->delete();

        Session::flash('flash_message', 'Đường đã được xóa thành công!');

        return redirect()->route('duong.index');
    }
}
