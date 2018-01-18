<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

use App\Http\Requests;
use App\Huyen;
use App\Pho;
use Session;


class PhoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phos = Pho::all();

        return view('phos.index')->withPhos($phos);
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
        return view('phos.create', compact('huyens'));
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
            'name' => 'required|unique:phos|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('pho/create')
                    ->withErrors($validator)
                    ->withInput();
        }


        $input = $request->all();

        Pho::create($input);

        \Session::flash('flash_message', 'Phố đã được tạo thành công!');

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
        $pho = Pho::find($id);
        
        if($pho === null){
            return view('errors.404');
        }

        //dd($pho);

        return view('phos.show')->withpho($pho);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pho = Pho::find($id);
        
        if($pho === null){
            return view('errors.404');
        }

        $huyens = Huyen::pluck('name', 'id');

        if (is_null($pho))
        {
            return Redirect::route('pho.index');
        }

        return \View::make('phos.edit', compact('pho', 'huyens'));
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

        $pho = Pho::find($id);
        
        if($pho === null){
            return view('errors.404');
        }

        $pho->update($input);

        \Session::flash('flash_message', 'Phố đã được sửa thành công!');

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
        $pho = Pho::find($id);

        if (is_null($pho))
        {
            Session::flash('flash_message', 'Không tìm thấy Phố bạn muốn xóa!');
            return Redirect::route('pho.index');
        }

        $pho->delete();

        Session::flash('flash_message', 'Phố đã được xóa thành công!');

        return redirect()->route('pho.index');
    }
}
