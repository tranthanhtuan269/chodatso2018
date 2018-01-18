<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\CreateTinBDSRequest;
use App\Loaibds;
use App\TinBDS;
use App\User;
use App\Tinh;
use App\Huong;
use DB;
use Session;
use Mail;

class TinBDSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tinbdss = DB::table('tinbdss')
                    ->where('tinbdss.nguoi_dang', '=', \Auth::id())
                    ->orderBy('updated_at', 'desc')
                    ->paginate(8);
        
        return view('tinbdss.index')->withtinbdss($tinbdss);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd(1);
        $loaibdss = Loaibds::pluck('name', 'id');
        $tinhs = Tinh::pluck('name', 'id');
        $huyens = DB::table('huyens')->where('tinh_id','=','1')->pluck('name', 'id'); //Loaibds::pluck('name', 'id');
        $phuongs = DB::table('phos')->where('huyen_id','=','1')->pluck('name', 'id'); //Loaibds::pluck('name', 'id');
        $duongs = DB::table('duongs')->where('huyen_id','=','1')->pluck('name', 'id'); //Loaibds::pluck('name', 'id');
        $duans = DB::table('duans')->where('huyen_id','=','1')->pluck('name', 'id'); //Loaibds::pluck('name', 'id');
        $huongs = Huong::pluck('name', 'id');

        //dd($tinhs);

        return view('tinbdss.create', compact(['tinhs', 'huyens', 'phuongs', 'duongs', 'duans', 'loaibdss', 'huongs']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTinBDSRequest $request)
    {
        // upload images to server
        $picture = '';
        $allPic = '';
        if ($request->hasFile('images1')) {
            $files = $request->file('images1');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $allPic .= $picture . ';';
                $destinationPath = base_path() . '/public/images';
                $file->move($destinationPath, $picture);
            }
        }
        // add images to database
        $input = $request->all();
        unset($input['images1']);
        $input['images'] = $allPic;
        $input['nguoi_dang'] = \Auth::user()->id;
        $input['gia'] = $input['gia'] * 1000000;
        
        //dd($input);
        $tinh = $input['tinh'];
        $huyen= $input['huyen'];
        $phuong= $input['phuong'];
        $duong= $input['duong'];
        
        // save 
        $tindang = TinBDS::create($input);
        
        // get user id
        $user = \Auth::user();
        //dd($user->email);
        // send email thông báo đăng tin thành công
        Mail::send('emails.thongbaodangtinbanthanhcong', [], function($message) use ($user) {
            $message->from('admin@chodatso.com', 'chodatso.com');
            $message->to($user->email)->subject('Thông báo từ chodatso.com');
        });

        // sending back with error message.
        \Session::flash('error', 'Hệ thống cần Quý khách cung cấp thêm thông tin về quyền sử dụng đất và chứng minh thư! Xin vui lòng hoàn thiện như email hệ thống gửi cho Quý khách! Xin chân thành cảm ơn!');
        return Redirect::to('tinbds/');
    }
    
    public function store2(CreateTinBDSRequest $request)
    {
        // upload images to server
        $picture = '';
        $allPic = '';
        if ($request->hasFile('images1')) {
            $files = $request->file('images1');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $allPic .= $picture . ';';
                $destinationPath = base_path() . '/public/images';
                $file->move($destinationPath, $picture);
            }
        }
        // add images to database
        $input = $request->all();
        unset($input['images1']);
        $input['images'] = $allPic;
        $input['nguoi_dang'] = \Auth::user()->id;
        $input['gia'] = $input['gia'] * 1000000;
        
        //dd($input);
        $tinh = $input['tinh'];
        $huyen= $input['huyen'];
        $phuong= $input['phuong'];
        $duong= $input['duong'];
        
        // save 
        $tindang = TinBDS::create($input);
        
        // send email thông báo đăng tin thành công
//        Mail::send('emails.thongbaodangtinbanthanhcong', [], function($message) use ($user) {
//            $message->from('admin@chodatso.com', 'chodatso.com');
//            $message->to($user->email)->subject('Thông báo từ chodatso.com');
//        });
        
        
        
        // get user id
        $user = \Auth::user();
        
        $checkquantam = DB::table('quantam')
                ->where('email', '=', $user->email)
                ->where('tinh', '=', $tinh)
                ->where('huyen', '=', $huyen)
                ->where('type', '=', 2)
                ->first();
        
        if ($checkquantam === null) {
            // quantam doesn't exist
            // add user to quantam database
            DB::table('quantam')->insert(
                [
                    'user' => $user->id,
                    'email' => $user->email,
                    'tinh' => $tinh,
                    'huyen' => $huyen,
                    'phuong' => $phuong,
                    'duong' => $duong,
                    'type' => 2
                    ]
            );
        }
        //dd()
        //DB::enableQueryLog();
        // select email
        $emails = DB::table('quantam')
                ->leftJoin('users', 'users.id', '=', 'quantam.user')
                ->select(
                    'users.id',
                    'quantam.email', 
                    'users.coins'
            );
        $emails = $emails->where('active','=','1');
        if(isset($tinh) && $tinh != null && $tinh != 0)
            $emails = $emails->where('tinh', '=', $tinh);
        if(isset($huyen) && $huyen != null && $huyen != 0)
            $emails = $emails->where('huyen', '=', $huyen);

        $emails = $emails->where('type', '=', 1);        

        $emails = $emails->get();
        //dd(DB::getQueryLog());
        //dd($emails);
        
        if(count($emails) > 0){
            $eListValid = [];
            $eListInvalid = [];
            for($i = 0; $i < count($emails); $i++){
                if($emails[$i]->coins - env('APP_COIN', '5') < 0){
                    $eListInvalid[] = $emails[$i]->email;
                    User::DeActiveUserByEmail($emails[$i]->email);
                }else{
                    $eListValid[] = $emails[$i]->email;
                }
            }
            
            //dd($eListInvalid);

            for($i = 0; $i < count($eListValid); $i++){
                Mail::send('emails.bannha', ['user' => $user, 'tindang' => $tindang], function($message) use ($eListValid) {
                    $message->from('admin@chodatso.com', 'chodatso.com');
                    $message->to($eListValid)->subject('Thông báo từ chodatso.com');
                });
                
                // giam coins
                $user_curr = User::where('email',$eListValid[$i])->first();
                $user_curr->decrement('coins', env('APP_COIN', '5'));
                // save giao dich
                DB::table('giaodichs')->insert(
                [
                        'user' => $user_curr->id,
                        'description' => 'Thanh toán cho email thông báo bất động sản số ' . $tindang->id,
                        'new' => $user_curr->coins,
                        'code' => '',
                        'tin_id' => $tindang->id,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                        ]
                );
            }
            
            for($i = 0; $i < count($eListInvalid); $i++){
                Mail::send('emails.thongbaonaptien', [], function($message) use ($eListInvalid) {
                    $message->from('admin@chodatso.com', 'chodatso.com');
                    $message->to($eListInvalid)->subject('Thông báo từ chodatso.com');
                });
            }
        }
        
        // send email thông báo đăng tin thành công
//        Mail::send('emails.thongbaodangtinbanthanhcong', [], function($message) use ($user) {
//            $message->from('admin@chodatso.com', 'chodatso.com');
//            $message->to($user->email)->subject('Thông báo từ chodatso.com');
//        });

        // sending back with error message.
        \Session::flash('error', 'uploaded file is not valid');
        return Redirect::to('tinbds/');
    }
    
    public function duyettin(){        
        
        // $id tin cần duyệt
        // Từ id => tin => tinh => huyen => 
        
        // $tindang
        // $user
        // 
        
        // select email
        $emails = DB::table('quantam')
                ->leftJoin('users', 'users.id', '=', 'quantam.user')
                ->where('active','=','1')
                ->select(
                    'users.id',
                    'quantam.email', 
                    'users.coins'
            );
        if(isset($tinh) && $tinh != null && $tinh != 0)
            $emails = $emails->where('tinh', '=', $tinh);
        if(isset($huyen) && $huyen != null && $huyen != 0)
            $emails = $emails->where('huyen', '=', $huyen);

        $emails = $emails->where('type', '=', 1);        

        $emails = $emails->get();
        //dd($emails);
        
        if(count($emails) > 0){
            $eListValid = [];
            for($i = 0; $i < count($emails); $i++){
                if($emails[$i]->coins - env('APP_COIN', '5') < 0){
                    User::DeActiveUserByEmail($emails[$i]->email);
                }else{
                    $eListValid[] = $emails[$i]->email;
                }
            }
            
            for($i = 0; $i < count($eListValid); $i++){
                Mail::send('emails.bannha', ['user' => $user, 'tindang' => $tindang], function($message) use ($eListValid) {
                    $message->from('admin@chodatso.com', 'chodatso.com');
                    $message->to($eListValid)->subject('Thông báo từ chodatso.com');
                });
                
                // giam coins
                $user_curr = User::where('email',$eListValid[$i])->first();
                $user_curr->decrement('coins', env('APP_COIN', '5'));
                // save giao dich
                DB::table('giaodichs')->insert(
                [
                        'user' => $user_curr->id,
                        'description' => 'Thanh toán cho email thông báo bất động sản số ' . $tindang->id,
                        'new' => $user_curr->coins,
                        'code' => '',
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s')
                        ]
                );
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tinbds = TinBDS::findOrFail($id);
        
        if($tinbds === null){
            return view('errors.404');
        }

        //dd($tinbds);

        return view('tinbdss.show')->withtinbds($tinbds);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tinbds = TinBDS::find($id);

        if (is_null($tinbds))
        {
            return Redirect::route('tinbds.index');
        }

        $loaibdss = Loaibds::pluck('name', 'id');
        $tinhs = Tinh::pluck('name', 'id');
        $huyens = DB::table('huyens')->where('tinh_id','=',$tinbds->tinh)->pluck('name', 'id'); //Loaibds::pluck('name', 'id');
        $phuongs = DB::table('phos')->where('huyen_id','=',$tinbds->huyen)->pluck('name', 'id'); //Loaibds::pluck('name', 'id');
        $duongs = DB::table('duongs')->where('huyen_id','=',$tinbds->huyen)->pluck('name', 'id'); //Loaibds::pluck('name', 'id');
        $duans = DB::table('duans')->where('huyen_id','=',$tinbds->huyen)->pluck('name', 'id'); //Loaibds::pluck('name', 'id');
        $huongs = Huong::pluck('name', 'id');

        return \View::make('tinbdss.edit', compact(['tinbds','tinhs', 'huyens', 'phuongs', 'duongs', 'duans', 'loaibdss', 'huongs']));
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
            'tieu_de' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
        }


        $input = $request->all();
        $input['gia'] = $input['gia'] * 1000000;
        //dd($input);
        $picture = '';
        $allPic = '';
        if ($request->hasFile('images1')) {
            $files = $request->file('images1');
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $picture = date('His').$filename;
                $allPic .= $picture . ';';
                $destinationPath = base_path() . '/public/images';
                $file->move($destinationPath, $picture);
            }
            unset($input['images1']);
            $input['images'] = $allPic;
        }

        $tinbds = TinBDS::find($id);
        
        if($tinbds === null){
            return view('errors.404');
        }

        $tinbds->update($input);

        \Session::flash('flash_message', 'tinbds đã được sửa thành công!');

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
        $tinbds = TinBDS::find($id);

        if (is_null($tinbds))
        {
            Session::flash('flash_message', 'Không tìm thấy tinbds bạn muốn xóa!');
            return Redirect::route('tinbds.index');
        }

        $tinbds->delete();

        Session::flash('flash_message', 'tinbds đã được xóa thành công!');

        return redirect()->route('tinbds.index');
    }
}
