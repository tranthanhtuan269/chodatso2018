<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Huong;
use Session;

class HuongController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $huongs = Huong::all();

        return view('huongs.index')->withHuongs($huongs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('huongs.create');
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
            'name' => 'required|unique:huongs|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('huong/create')
                    ->withErrors($validator)
                    ->withInput();
        }


        $input = $request->all();

        Huong::create($input);

        \Session::flash('flash_message', 'Hướng đã được tạo thành công!');

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
        $huong = Huong::find($id);
        
        if($huong === null){
            return view('errors.404');
        }

        //dd($huong);

        return view('huongs.show')->withhuong($huong);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $huong = Huong::find($id);
        
        if($huong === null){
            return view('errors.404');
        }

        if (is_null($huong))
        {
            return Redirect::route('huong.index');
        }

        return \View::make('huongs.edit', compact('huong'));
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
            'name' => 'required|unique:huongs|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $input = $request->all();

        $huong = Huong::find($id);
        
        if($huong === null){
            return view('errors.404');
        }

        $huong->update($input);

        \Session::flash('flash_message', 'Hướng đã được sửa thành công!');

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
        $huong = Huong::find($id);

        if (is_null($huong))
        {
            Session::flash('flash_message', 'Không tìm thấy Hướng bạn muốn xóa!');
            return Redirect::route('huong.index');
        }

        $huong->delete();

        Session::flash('flash_message', 'Hướng đã được xóa thành công!');

        return redirect()->route('huong.index');
    }
}
