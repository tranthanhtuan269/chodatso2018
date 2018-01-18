<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Huyen;
use App\Duan;
use Session;


class duanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $duans = Duan::all();

        return view('duans.index')->withduans($duans);
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
        return view('duans.create', compact('huyens'));
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
            'name' => 'required|unique:duans|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('duan/create')
                    ->withErrors($validator)
                    ->withInput();
        }


        $input = $request->all();

        Duan::create($input);

        \Session::flash('flash_message', 'Dự án đã được tạo thành công!');

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
        $duan = Duan::find($id);
        
        if($duan === null){
            return view('errors.404');
        }

        //dd($duan);

        return view('duans.show')->withduan($duan);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $duan = Duan::find($id);
        
        if($duan === null){
            return view('errors.404');
        }

        $huyens = Huyen::pluck('name', 'id');

        if (is_null($duan))
        {
            return Redirect::route('duan.index');
        }

        return \View::make('duans.edit', compact('duan', 'huyens'));
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

        $duan = Duan::find($id);

        $duan->update($input);

        \Session::flash('flash_message', 'Dự án đã được sửa thành công!');

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
        $duan = Duan::find($id);

        if (is_null($duan))
        {
            Session::flash('flash_message', 'Không tìm thấy Dự án bạn muốn xóa!');
            return Redirect::route('duan.index');
        }

        $duan->delete();

        Session::flash('flash_message', 'Dự án đã được xóa thành công!');

        return redirect()->route('duan.index');
    }
}
