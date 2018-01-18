<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Tinh;
use Session;

class TinhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tinhs = Tinh::all();

        return view('tinhs.index')->withTinhs($tinhs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tinhs.create');
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
            'name' => 'required|unique:tinhs|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('tinh/create')
                    ->withErrors($validator)
                    ->withInput();
        }


        $input = $request->all();

        Tinh::create($input);

        \Session::flash('flash_message', 'Tỉnh đã được tạo thành công!');

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
        $tinh = Tinh::findOrFail($id);

        //dd($tinh);

        return view('tinhs.show')->withTinh($tinh);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tinh = Tinh::find($id);

        if (is_null($tinh))
        {
            return Redirect::route('tinh.index');
        }

        return \View::make('tinhs.edit', compact('tinh'));
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
            'name' => 'required|unique:tinhs|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $input = $request->all();

        $tinh = Tinh::find($id);

        $tinh->update($input);

        \Session::flash('flash_message', 'Tỉnh đã được sửa thành công!');

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
        $tinh = Tinh::find($id);

        if (is_null($tinh))
        {
            Session::flash('flash_message', 'Không tìm thấy Tỉnh bạn muốn xóa!');
            return Redirect::route('tinh.index');
        }

        $tinh->delete();

        Session::flash('flash_message', 'Tỉnh đã được xóa thành công!');

        return redirect()->route('tinh.index');
    }
}
