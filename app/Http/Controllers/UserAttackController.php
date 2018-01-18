<?php

namespace App\Http\Controllers;

use DB;

use App\Yeucaunha;
use App\User;

class UserAttackController extends Controller
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
    
    public function saokegiaodich()
    {
        $out_put = [];
        // đăng tin nhận tiền
        $users = DB::table('users')
                        ->join('tinbdss', 'tinbdss.nguoi_dang', '=', 'users.id')
                        ->join('giaodichs', 'giaodichs.tin_id', '=', 'tinbdss.id')
                        ->select('users.name as nguoiyeucau','giaodichs.id as magiaodich', 'giaodichs.tin_id as matin', 'users.nguoi_gioi_thieu')
                        ->where('users.nguoi_gioi_thieu', '=', \Auth::user()->id)
                     ->get();
        $out_put['dangtin'] = $users;
        //dd($users);
        // đăng yêu cầu nhận tiền
        $users = DB::table('users')
                        ->join('giaodichs', 'giaodichs.user', '=', 'users.id')
                        ->select('users.name as nguoiyeucau','giaodichs.id as magiaodich', 'giaodichs.tin_id as matin', 'users.nguoi_gioi_thieu')
                        ->where('users.nguoi_gioi_thieu', '=', \Auth::user()->id)
                     ->get();
        $out_put['yeucau'] = $users;
        //dd($out_put);
        //dd($giaodichboinguoiyeucau);
        // 2. Người đăng tin
        return view('home.saoke')->withGiaodichs($out_put);
    }
    
    public function gioithieu(){
        
        if(isset($_POST)){
           if(isset($_POST['phone'])){
               //echo $_POST['phone'];
                $user = DB::table('users')
                     ->select('id', 'nguoi_gioi_thieu')
                     ->where('phone', '=', $_POST['phone'])
                     ->first();
               
                if($user === null){
                    return view('home.gioithieu')->withError('Không tìm được người mà bạn muốn giới thiệu!');
                }else{
                    if($user->nguoi_gioi_thieu !== null)
                    {
                        return view('home.gioithieu')->withError('Người bạn muốn giới thiệu đã được một người khác giới thiệu!');
                    }else{
                        DB::table('users')
                                ->where('id', $user->id)
                                ->update(['nguoi_gioi_thieu' => \Auth::user()->id]);
                        return view('home.gioithieu')->withError('Bạn đã giới thiệu thành công! Giờ khách hàng này là của bạn!');
                    }
                }
           }
        }
    }
    
    public function danhsachkhachhang(){
        $danhsachkhachhang = DB::table('users')
                                ->select('id', 'name', 'email', 'phone', 'coins')
                                ->where('nguoi_gioi_thieu', '=', \Auth::user()->id)
                                ->paginate(12);
        //dd(count($danhsachkhachhang));
        return view('home.danhsachkhachhang')->withDanhsachkhachhang($danhsachkhachhang);
    }
    
    public function themyeucau(){
        if (\Auth::check())
        {
            if(\Auth::user()->id == 1){
                $tinh_huyen = [
                    [10,120,10],
                    [10,120,20],
                    [10,120,15],
                    [10,120,15],
                    [10,120,15],
                    [10,120,15],
                    [10,120,15],
                    [10,121,8],
                    [10,121,5],
                    [10,122,6],
                    [10,122,5],
                    [10,123,10],
                    [10,123,5],
                    [10,124,5],
                    [10,125,5],
                    [10,126,5],
                    [10,127,5],
                    [10,128,5],
                    [10,129,5],
                    [49,543,30],
                    [49,543,12],
                    [49,543,12],
                    [49,543,12],
                    [49,543,15],
                    [49,543,15],
                    [49,543,15],
                    [49,543,20],
                    [49,543,25],
                    [49,544,5],
                    [49,544,10],
                    [49,544,8],
                    [49,544,12],
                    [49,545,5],
                    [49,546,5],
                    [49,546,10],
                    [49,546,8],
                    [49,546,15],
                    [49,547,8],
                    [49,548,8],
                    [49,549,8],
                    [49,550,8],
                    [49,551,8],
                    [49,552,8],
                    [49,553,8],
                    [49,554,8],
                    [49,555,8],
                    [49,556,8],
                    [49,557,8],

                    [1,1,130],
                    [1,1,100],
                    [1,1,110],
                    [1,1,125],
                    [1,1,90],
                    [1,1,100],
                    [1,1,120],
                    [1,1,110],

                    [1,2,130],
                    [1,2,85],
                    [1,2,90],
                    [1,2,85],
                    [1,2,90],
                    [1,2,100],
                    [1,2,120],
                    [1,2,110],
                    [1,2,200],

                    [1,3,130],
                    [1,3,90],
                    [1,3,100],
                    [1,3,120],
                    [1,3,110],

                    [1,4,80],
                    [1,4,90],
                    [1,4,100],
                    [1,4,110],
                    [1,4,120],
                    [1,4,130],

                    [1,5,80],
                    [1,5,90],
                    [1,5,100],
                    [1,5,110],
                    [1,5,120],

                    [1,7,60],
                    [1,7,70],
                    [1,7,80],
                    [1,7,90],
                    [1,7,100],
                    [1,7,110],
                    [1,7,120],

                    [1,8,80],
                    [1,8,90],
                    [1,8,100],
                    [1,8,110],
                    [1,8,120],
                    [1,8,130],
                    [1,8,140],
                    [1,8,150],

                    [1,9,80],
                    [1,9,90],
                    [1,9,100],
                    [1,9,110],
                    [1,9,120],
                    [1,9,130],
                    [1,9,140],
                    [1,9,150],
                    [1,9,160],
                    [1,9,170],
                    [1,9,180],
                    [1,9,190],
                    [1,9,200],
                    [1,9,210],
                    [1,9,220],
                    [1,9,230],
                    [1,9,240],
                    [1,9,250],
                    [1,9,300],
                    [1,9,350],
                    [1,9,400],
                    [1,9,450],
                    [1,9,500],
                    [1,9,550],

                    [1,10,80],
                    [1,10,90],
                    [1,10,100],
                    [1,10,110],
                    [1,10,120],
                    [1,10,130],
                    [1,10,140],
                    [1,10,150],
                    [1,10,160],
                    [1,10,170],
                    [1,10,180],
                    [1,10,190],
                    [1,10,200],
                    [1,10,210],
                    [1,10,220],
                    [1,10,230],
                    [1,10,240],
                    [1,10,250],
                    [1,10,300],

                    [1,11,18],
                    [1,11,12],
                    [1,11,10],
                    [1,11,15],
                    [1,11,20],
                    [1,11,30],
                    [1,11,40],
                    [1,11,50],
                    [1,11,60],
                    [1,11,70],
                    [1,11,80],
                    [1,11,90],
                    [1,11,100],
                    [1,11,110],
                    [1,11,120],

                    [1,26,18],
                    [1,26,12],
                    [1,26,10],
                    [1,26,15],
                    [1,26,20],
                    [1,26,30],
                    [1,26,60],
                    [1,26,80],
                    [1,26,90],
                    [1,26,100],
                    [1,26,110],
                    [1,26,120],

                    [1,27,18],
                    [1,27,10],
                    [1,27,15],
                    [1,27,20],
                    [1,27,30],
                    [1,27,60],
                    [1,27,80],
                    [1,27,90],
                    [1,27,100],
                    [1,27,110],
                    [1,27,120],

                    [1,28,18],
                    [1,28,12],
                    [1,28,10],
                    [1,28,15],
                    [1,28,20],
                    [1,28,60],
                    [1,28,80],
                    [1,28,90],
                    [1,28,100],
                    [1,28,110],
                    [1,28,120],

                    [1,29,18],
                    [1,29,12],
                    [1,29,10],
                    [1,29,15],
                    [1,29,20],
                    [1,29,60],
                    [1,29,80],
                    [1,29,90],
                    [1,29,100],
                    [1,29,110],
                    [1,29,120],

                    [1,30,10],
                    [1,30,15],
                    [1,30,20],
                    [1,30,30],
                    [1,30,50],
                    [1,30,60],
                    [1,30,80],
                    [1,30,90],
                    [1,30,100],
                    [1,30,110],
                    [1,30,120],

                    [2,31,80],
                    [2,31,90],
                    [2,31,100],
                    [2,31,110],
                    [2,31,120],
                    [2,31,130],
                    [2,31,140],
                    [2,31,150],
                    [2,31,160],
                    [2,31,170],
                    [2,31,180],
                    [2,31,190],
                    [2,31,200],
                    [2,31,210],
                    [2,31,220],
                    [2,31,230],
                    [2,31,240],
                    [2,31,250],
                    [2,31,300],
                    [2,31,350],
                    [2,31,400],
                    [2,31,450],
                    [2,31,500],
                    [2,31,550],

                    [2,32,50],
                    [2,32,60],
                    [2,32,80],
                    [2,32,90],
                    [2,32,100],
                    [2,32,110],
                    [2,32,120],
                    [2,32,130],
                    [2,32,140],
                    [2,32,150],
                    [2,32,160],
                    [2,32,170],
                    [2,32,180],

                    [2,33,50],
                    [2,33,60],
                    [2,33,80],
                    [2,33,90],
                    [2,33,100],
                    [2,33,110],
                    [2,33,120],
                    [2,33,130],
                    [2,33,140],
                    [2,33,150],
                    [2,33,160],
                    [2,33,170],
                    [2,33,180],
                    [2,33,190],
                    [2,33,200],

                    [2,34,50],
                    [2,34,60],
                    [2,34,80],
                    [2,34,90],
                    [2,34,100],
                    [2,34,110],
                    [2,34,120],
                    [2,34,130],
                    [2,34,140],
                    [2,34,150],
                    [2,34,160],
                    [2,34,170],
                    [2,34,180],
                    [2,34,190],
                    [2,34,200],

                    [2,35,50],
                    [2,35,60],
                    [2,35,80],
                    [2,35,90],
                    [2,35,100],
                    [2,35,110],
                    [2,35,120],
                    [2,35,130],
                    [2,35,140],
                    [2,35,150],
                    [2,35,160],
                    [2,35,170],
                    [2,35,180],
                    [2,35,190],
                    [2,35,200],

                    [2,36,50],
                    [2,36,60],
                    [2,36,80],
                    [2,36,90],
                    [2,36,100],
                    [2,36,110],
                    [2,36,120],
                    [2,36,130],
                    [2,36,140],
                    [2,36,150],
                    [2,36,160],
                    [2,36,170],
                    [2,36,180],
                    [2,36,190],
                    [2,36,200],


                    [2,37,30],
                    [2,37,40],
                    [2,37,50],
                    [2,37,35],
                    [2,37,50],
                    [2,37,60],
                    [2,37,80],
                    [2,37,90],
                    [2,37,100],
                    [2,37,110],
                    [2,37,120],
                    [2,37,130],
                    [2,37,140],
                    [2,37,150],
                    [2,37,160],

                    [2,38,30],
                    [2,38,40],
                    [2,38,50],
                    [2,38,35],
                    [2,38,50],
                    [2,38,60],
                    [2,38,80],
                    [2,38,90],
                    [2,38,100],
                    [2,38,110],
                    [2,38,120],
                    [2,38,130],
                    [2,38,140],
                    [2,38,150],
                    [2,38,160],

                    [2,39,25],
                    [2,39,30],
                    [2,39,35],
                    [2,39,40],
                    [2,39,45],
                    [2,39,50],
                    [2,39,35],
                    [2,39,50],
                    [2,39,60],
                    [2,39,80],
                    [2,39,90],

                    [2,40,50],
                    [2,40,60],
                    [2,40,80],
                    [2,40,90],
                    [2,40,100],
                    [2,40,110],
                    [2,40,120],
                    [2,40,130],
                    [2,40,140],
                    [2,40,150],
                    [2,40,160],
                    [2,40,170],
                    [2,40,180],
                    [2,40,190],
                    [2,40,200],

                    [2,41,50],
                    [2,41,60],
                    [2,41,80],
                    [2,41,90],
                    [2,41,100],
                    [2,41,110],
                    [2,41,120],
                    [2,41,130],
                    [2,41,140],
                    [2,41,150],
                    [2,41,160],
                    [2,41,170],
                    [2,41,180],
                    [2,41,190],
                    [2,41,200],

                    [2,42,10],
                    [2,42,15],
                    [2,42,20],
                    [2,42,25],
                    [2,42,30],
                    [2,42,35],
                    [2,42,40],
                    [2,42,50],
                    [2,42,60],
                    [2,42,80],
                    [2,42,90],
                    [2,42,100],

                    [2,43,10],
                    [2,43,15],
                    [2,43,20],
                    [2,43,25],
                    [2,43,30],
                    [2,43,35],
                    [2,43,40],
                    [2,43,50],
                    [2,43,60],
                    [2,43,80],
                    [2,43,90],
                    [2,43,100],

                    [2,44,20],
                    [2,44,25],
                    [2,44,30],
                    [2,44,35],
                    [2,44,40],
                    [2,44,50],
                    [2,44,60],
                    [2,44,80],
                    [2,44,90],
                    [2,44,100],
                    [2,44,110],
                    [2,44,120],
                    [2,44,130],
                    [2,44,140],
                    [2,44,150],
                    [2,44,160],
                    [2,44,170],
                    [2,44,180],
                    [2,44,190],
                    [2,44,200],

                    [2,45,30],
                    [2,45,35],
                    [2,45,40],
                    [2,45,50],
                    [2,45,60],
                    [2,45,80],
                    [2,45,90],
                    [2,45,100],
                    [2,45,110],
                    [2,45,120],
                    [2,45,130],
                    [2,45,140],
                    [2,45,150],
                    [2,45,160],
                    [2,45,170],
                    [2,45,180],
                    [2,45,190],
                    [2,45,200],
		];

                $dientich = [30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 30, 40, 50,40, 50,40, 50,40, 50,40, 50,40, 50,40, 50,40, 50,40, 50,40, 50,40, 50,40, 50,40, 50,40, 50,40, 50, 60, 60, 60, 60, 80, 80, 80, 90, 90, 100, 120, 200, 300];

                $count_tinh_huyen = count($tinh_huyen) - 1;

                $date =  date("Y-m-d H:i:s"); 

                $numU = Yeucaunha::orderBy('id', 'desc')->first()->nguoi_dang;
                echo "INSERT INTO `chodatso_main`.`yeucaunha` (`id`, `nguoi_dang`, `loaiyeucau`, `tinh`, `huyen`, `phuong`, `duong`, `duan`, `tam_tien`, `loaibds`, `mua_gap`, `kinh_doanh`, `dau_tu`, `de_o`, `huong_nha`, `phong_ngu`, `wc`, `dien_tich`, `mat_tien`, `duong_vao`, `tang`, `phong_khach`, `yeu_cau`, `created_at`, `updated_at`) VALUES ";
                for($i = $numU + 1; $i < $numU + 88; $i++){
                        $rad = rand(0,$count_tinh_huyen);
                        $rand_tang = rand(1,3);
                        $rand_mattien = rand(4,5);
                        $rand_duongvao = rand(4,5);
                        $rand_huongnha = rand(1,9);
                        $rad_dt = rand(0,8);
                        echo "(NULL, '$i', '0', '" . $tinh_huyen[$rad][0] ."', '". $tinh_huyen[$rad][1]."', '0', '0', '0', '".$tinh_huyen[$rad][2]*$dientich[$rad_dt]*1000000 ."', '1', '1', '1', '1', '1', '".$rand_huongnha."', '".$rand_tang."', '".$rand_tang."', '".$dientich[$rad_dt]."', '".$rand_mattien."', '".$rand_duongvao."', '".$rand_tang."', '1', '', '".$date."', '".$date."'),<br />";
                        DB::insert('INSERT INTO yeucaunha (`id`, `nguoi_dang`, `loaiyeucau`, `tinh`, `huyen`, `phuong`, `duong`, `duan`, `tam_tien`, `loaibds`, `mua_gap`, `kinh_doanh`, `dau_tu`, `de_o`, `huong_nha`, `phong_ngu`, `wc`, `dien_tich`, `mat_tien`, `duong_vao`, `tang`, `phong_khach`, `yeu_cau`, `created_at`, `updated_at`) values (NULL, ?, 0, ?, ?, 0, 0, 0, ?, 1, 1, 1, 1, 1, ?, ?, ?, ?, ?, ?, ?, 1, "", ?, ?)', [$i, $tinh_huyen[$rad][0], $tinh_huyen[$rad][1], $tinh_huyen[$rad][2]*$dientich[$rad_dt]*1000000, $rand_huongnha, $rand_tang, $rand_tang, $dientich[$rad_dt], $rand_mattien, $rand_duongvao, $rand_tang, $date, $date]);
                }
                
                
            }else{
                return view('errors.404');
            }
        }else{
            return view('errors.404');
        }
    }
    
    public function themnguoidung(){
        if (\Auth::check())
        {
            if(\Auth::user()->id == 1){
                $ho = [	'Trần', 'Trần', 'Trần', 'Trần', 'Trần', 'Trần', 'Trần', 'Trần', 'Trần', 'Trần', 'Trần', 'Trần', 'Trần', 
			'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Nguyễn', 'Đặng', 
			'Hoàng', 'Dương', 'Vũ', 'Phạm', 'Phạm', 'Phạm', 'Phạm', 'Phạm', 'Phạm', 'Phạm', 'Hoàng', 'Huỳnh', 'Phan', 'Vũ', 'Võ', 'Phan', 'Vũ', 'Võ', 'Đặng', 'Bùi', 'Đỗ', 'Hồ', 'Ngô', 'Dương',
			'Lê', 'Lê', 'Lê', 'Lê', 'Lê', 'Lê', 'Lê', 'Lê', 'Lê', 'Lê', 'Lê', 'Lê', 'Mai', 'Mai', 'Mai', 'Võ', 'Phạm', 'Phạm', 'Đặng', 'Bùi', 'Hồ', 
			'Đỗ', 'Hồ', 'Ngô', 'Dương', 'Lý', 'Đào', 'Phí', 'Đoàn', 'Vương', 'Trịnh', 'Trương', 'Đinh', 'Đinh', 'Đinh', 'Phùng', 'Mai', 'Tô', 'Hà', 'Tạ'];
                $lot = [ '', ' Văn', ' Văn', ' Văn', ' Văn', ' Văn', ' Văn', ' Văn', ' Văn', ' Thanh', ' Anh', ' Hoàng', ' Minh', ' Ngọc', ' Mạnh', ' Hà', ' Thanh', ' Phi', ' Hải', ' Hồng', ' Minh', ' Việt', ' Bá', ' Bá', ' Bá', ' Bá', ' Bá', ' Bá', ' Bá'];
                $ten = [ ' Tiến', ' Tuấn', ' Tuấn', ' Tuấn', ' Tuấn', ' Tuấn', ' Kiên', ' Kiên', ' Kiên', ' Cường', ' Cường', ' Cường', ' Hạnh', ' Minh', ' Sơn', ' Nam', ' Thái', ' Thịnh', ' Đại', ' Linh', ' Thủy', ' Phương', ' Thanh', ' Thắng', ' Hùng', ' Sáng', ' Hải', ' Phát', ' Nhân', ' Linh', ' Chung', ' Phương', ' Thủy', ' Sơn', ' Đạt', ' Đại', ' Tùng', ' Phương', ' Long', ' Quân', ' Hưng', ' Phong', ' Trường', ' Trường', ' Đức', ' Vinh', ' Nam', ' Dũng', ' Huân', ' Ngọc', ' Hoàng', ' Tiệp', ' Khương' , ' Quyền', ' Khải', ' Mạnh', ' Tú', ' Hoàng', ' Đại'];

                $countHo = count($ho) - 1;
                $countLot = count($lot) - 1;
                $countTen = count($ten) - 1;
                $date =  date("Y-m-d H:i:s"); 
                echo "INSERT INTO `users`(`id`, `name`, `email`, `avatar`, `address`, `phone`, `phone2`, `coins`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES ";
                $numU = User::orderBy('id', 'desc')->first()->id;
                
                for($i = $numU + 1; $i < $numU + 500; $i++){
                        $hovaten = $ho[rand(0,$countHo)] . $lot[rand(0,$countLot)] . $ten[rand(0,$countTen)];
                        echo "(NULL, '$hovaten', 'chodatso".$i."@chodatso.com', NULL, NULL, '01699658181', NULL, '30', '123', '123', '1', '".$date."', '".$date."'),<br />";
                        DB::insert('INSERT INTO `users`(`id`, `name`, `email`, `avatar`, `address`, `phone`, `phone2`, `coins`, `password`, `remember_token`, `active`, `created_at`, `updated_at`) VALUES (NULL, ?, ?, NULL, NULL, ?, NULL, ?, ?, ?, ?, ?, ?)', [$hovaten, 'chodatso'.$i.'@chodatso.com', '01699658181', '30', '123', '123', '1', $date, $date]);
                }
            }else{
                return view('errors.404');
            }
        }else{
            return view('errors.404');
        }
    }
}


    