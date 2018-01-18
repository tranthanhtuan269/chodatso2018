<?php

namespace App\Http\Controllers;

use App\QuestionAndAnswer;
use Auth;
use App\User;
use App\TinBDS;
use DB;
use Request;
use Mail;

class ActionController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function thanhtoanbaokim(){
        return view('actions.thanhtoanbaokim');
    }

    public function tienhanhthanhtoan(){
        return view('actions.request');
    }

    public function thanhtoannganluong(){
        return view('actions.thanhtoannganluong');
    }
    
    public function success(){
        return view('actions.success');
    }
    
    public function termsofservice(){
        return view('actions.termsofservice');
    }
    
    public function privacypolicy(){
        return view('actions.privacypolicy');
    }
    
    public function pricepolicy(){
        return view('actions.pricepolicy');
    }
    
    public function thongbao(){
        return view('actions.thongbao');
    }
    
    public function naptien(){
        return view('actions.naptien');
    }
    
    public function nganluongactive(){
        return view('actions.nganluongactive');
    }
    
    public function thanhtoanthanhcong(){
        return view('actions.paymentsuccess');
    }
    
    public function questionsandanswers(){
        //$questionAndAnswers = QuestionAndAnswer::all();
        //dd($questionAndAnswers);
        
        return view('actions.questionsandanswers')->withQAA("");
    }
    
    public function nhadaban(){
        $tinmns = DB::table('tinbdss')
                    ->join('tinhs', 'tinhs.id', '=', 'tinbdss.tinh')
                    ->join('huyens', 'huyens.id', '=', 'tinbdss.huyen')
                    ->join('users', 'users.id', '=', 'tinbdss.nguoi_dang')
                    ->select('tinbdss.*', 'huyens.name as ten_huyen', 'tinhs.name as ten_tinh', 'users.name as phone')
                    ->where('tinbdss.loaiyeucau', '=', 0)
                    ->where('tinbdss.da_ban', '=', 1)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);   

        return view('actions.nhadaban')->withtinmns($tinmns);
    }
    
    public function nhachuaduyet(){
        $tinmns = DB::table('tinbdss')
                    ->join('tinhs', 'tinhs.id', '=', 'tinbdss.tinh')
                    ->join('huyens', 'huyens.id', '=', 'tinbdss.huyen')
                    ->join('users', 'users.id', '=', 'tinbdss.nguoi_dang')
                    ->select('tinbdss.*', 'huyens.name as ten_huyen', 'tinhs.name as ten_tinh', 'users.name as phone')
                    ->where('tinbdss.loaiyeucau', '=', 0)
                    ->where('tinbdss.active', '=', 0)
                    ->orderBy('updated_at', 'desc')
                    ->paginate(12);   

        return view('actions.nhachuaduyet')->withtinmns($tinmns);
    }
    
    public function khachquantam(){
        //dd(1);
        $sub = DB::select('SELECT COUNT(*) AS yc_count, huyen, huyens.name as ten_huyen, tinhs.name as ten_tinh FROM quantam JOIN huyens ON huyens.id = quantam.huyen
                            JOIN tinhs ON tinhs.id = huyens.tinh_id join users on users.id = quantam.user WHERE type = 1 and users.coins >= 5 GROUP BY huyen');
        //dd($sub->getQuery());
        //$count = DB::table( DB::raw($sub) )->mergeBindings($sub->getQuery())->get();
        //dd($sub);
        //$yeucaunhas = null;
        
        return view('actions.khachquantam')->withYeucaunhas($sub);
    }
    
    public function duyettin(){
        if(Auth::user() != null){
            if(Auth::user()->id == 1){
                $tinmns = DB::table('tinbdss')
                        ->join('tinhs', 'tinhs.id', '=', 'tinbdss.tinh')
                        ->join('huyens', 'huyens.id', '=', 'tinbdss.huyen')
                        ->join('users', 'users.id', '=', 'tinbdss.nguoi_dang')
                        ->select(
                                'tinbdss.id as id', 
                                'tinbdss.images as images',
                                'huyens.name as ten_huyen', 
                                'tinhs.name as ten_tinh', 
                                'users.name as nguoi_dang',
                                'users.email as email',
                                'users.phone as phone')
                        ->where('tinbdss.loaiyeucau', '=', 0)
                        ->where('tinbdss.active', '=', 0)
                        ->orderBy('tinbdss.updated_at', 'desc')
                        ->paginate(12);   
                //dd($tinmns);
                return view('actions.duyettin')->withtinmns($tinmns);
            }
        }
        
        return view('errors.404');
    }
    
    public function activetin(){
        if(Auth::user()->id == 1){
            if(isset($_POST) && $_POST["id"] != null){
                $id = $_POST["id"];
                $tinbds = TinBDS::find($id);

                if (is_null($tinbds))
                {
                    $returnArr['code'] = 0;
                    $returnArr['message'] = "Unsuccess";
                    return json_encode($returnArr);
                }

                $user = User::find($tinbds->nguoi_dang);
                //dd($user);
                $tinh = $tinbds->tinh;
                $huyen = $tinbds->huyen;
                //dd($huyen);
                $tinbds->active = 1;
                $returnArr = array();
                if($tinbds->save()){
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
                    $emails = $emails->distinct();
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

                        //dd($eListValid);
                        Mail::send('emails.bannha', ['user' => $user, 'tindang' => $tinbds], function($message) use ($eListValid) {
                            $message->from('admin@chodatso.com', 'chodatso.com');
                            $message->to($eListValid)->subject('Thông báo từ chodatso.com');
                        });

                        for($i = 0; $i < count($eListValid); $i++){
                            // giam coins
                            $user_curr = User::where('email',$eListValid[$i])->first();
                            $user_curr->decrement('coins', env('APP_COIN', '5'));
                            // save giao dich
                            DB::table('giaodichs')->insert(
                            [
                                    'user' => $user_curr->id,
                                    'description' => 'Thanh toán cho email thông báo bất động sản số ' . $tinbds->id,
                                    'new' => $user_curr->coins,
                                    'code' => '',
                                    'created_at' => date('Y-m-d H:i:s'),
                                    'updated_at' => date('Y-m-d H:i:s')
                                    ]
                            );
                        }
                    }
                   $returnArr['code'] = 1;
                   $returnArr['message'] = "Success";
                }else{
                    $returnArr['code'] = 0;
                    $returnArr['message'] = "Unsuccess";
                }
                return json_encode($returnArr);
            }
        }
    }
    
    public function removetin(){
        if(Auth::user()->id == 1){
            if(isset($_POST) && $_POST["id"] != null){
                $id = $_POST["id"];
                $tinbds = TinBDS::find($id);

                $ret = $tinbds->delete();
                $returnArr = array();
                if($ret){
                   $returnArr['code'] = 1;
                   $returnArr['message'] = "Success";
                }else{
                    $returnArr['code'] = 0;
                   $returnArr['message'] = "Unsuccess";
                }
                return json_encode($returnArr);
            }
        }
    }
    
    public function googleSearch(){
        return view('actions.googleSearch');
    }
    
    public function danhsachquantam(){
        $yeucaunhas = DB::table('quantam')
                    ->leftjoin('tinhs', 'tinhs.id', '=', 'quantam.tinh')
                    ->leftjoin('huyens', 'huyens.id', '=', 'quantam.huyen')
                    ->join('users', 'users.id', '=', 'quantam.user')
                    ->select('quantam.*', 'quantam.id as tin_id', 'users.*', 'huyens.name as ten_huyen', 'tinhs.name as ten_tinh')
                    ->where('quantam.type', '=', 1)
                    ->paginate(12);   
        return view('actions.khachquantam')->withYeucaunhas($yeucaunhas);
    }
    
    public function quanlyyeucau(){
        $yeucaus = DB::table('yeucaunha')
                    ->leftjoin('tinhs', 'tinhs.id', '=', 'yeucaunha.tinh')
                    ->leftjoin('huyens', 'huyens.id', '=', 'yeucaunha.huyen')
                    ->select('yeucaunha.id','yeucaunha.dien_tich','yeucaunha.tam_tien','huyens.name as ten_huyen', 'tinhs.name as ten_tinh')
                    ->where('yeucaunha.nguoi_dang', '=', \Auth::id())
                    ->orderBy('yeucaunha.updated_at', 'asc')
                    ->get();
        return view('actions.quanlyyeucau')->withyeucaus($yeucaus);
    }
    
    public function taoyeucau(){
        if(isset($_POST)){
            //dd($_POST);
            $user = \Auth::user();
            $tinh = $_POST['tinh'];
            $huyen = $_POST['huyen'];
            //dd($user->email);
            $ret = DB::table('yeucaunha')->insert(
	        [
	                'nguoi_dang' => $user->id,
	                'tinh' => $tinh,
	                'huyen' => $huyen,
	                'tam_tien' => $_POST['tam_tien'] * 1000000,
	                'dien_tich' => $_POST['dien_tich'],
	                'created_at' => date('Y-m-d H:i:s'),
	                'updated_at' => date('Y-m-d H:i:s')
	                ]
	        );
            
            $checkquantam = DB::table('quantam')
                ->where('email', '=', $user->email)
                ->where('tinh', '=', $tinh)
                ->where('huyen', '=', $huyen)
                ->where('type', '=', 1)
                ->first();
        
            if ($checkquantam === null) {
                // quantam doesn't exist
                // add user to quantam database
                // add user to quantam database
                DB::table('quantam')->insert(
                    [
                        'user' => $user->id,
                        'email' => $user->email,
                        'tinh' => $tinh,
                        'huyen' => $huyen,
                        'phuong' => 0,
                        'duong' => 0,
                        'type' => 1
                        ]
                );
            }   
	        
            $returnArr = array();
            if($ret){
               $returnArr['code'] = 1;
               $returnArr['message'] = "Success";
            }else{
                $returnArr['code'] = 0;
               $returnArr['message'] = "Unsuccess";
            }
            return json_encode($returnArr);
        }
    }
    
    public function login(){
        $returnArr = array();
        $returnArr['code'] = 1;
        $returnArr['message'] = "Success";
        return json_encode($returnArr);
    }
}