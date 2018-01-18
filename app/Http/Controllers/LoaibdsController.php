<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Loaibds;
use Session;

class LoaibdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaibdss = Loaibds::all();

        return view('loaibdss.index')->withLoaibdss($loaibdss);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('loaibdss.create');
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
            'name' => 'required|unique:loaibdss|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('loaibds/create')
                    ->withErrors($validator)
                    ->withInput();
        }


        $input = $request->all();

        Loaibds::create($input);

        \Session::flash('flash_message', 'Loại bds đã được tạo thành công!');

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
        $loaibds = Loaibds::find($id);
        
        if($loaibds === null){
            return view('errors.404');
        }

        //dd($loaibds);

        return view('loaibdss.show')->withLoaibds($loaibds);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaibds = Loaibds::find($id);

        if (is_null($loaibds))
        {
            return Redirect::route('loaibds.index');
        }

        return \View::make('loaibdss.edit', compact('loaibds'));
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
            'name' => 'required|unique:loaibdss|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }

        $input = $request->all();

        $loaibds = Loaibds::find($id);
        
        if($loaibds === null){
            return view('errors.404');
        }

        $loaibds->update($input);

        \Session::flash('flash_message', 'Loại bds đã được sửa thành công!');

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
        $loaibds = Loaibds::find($id);

        if (is_null($loaibds))
        {
            Session::flash('flash_message', 'Không tìm thấy Loại bds bạn muốn xóa!');
            return Redirect::route('loaibds.index');
        }

        $loaibds->delete();

        Session::flash('flash_message', 'Loại bds đã được xóa thành công!');

        return redirect()->route('loaibds.index');
    }
}
