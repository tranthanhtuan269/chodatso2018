<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

    Route::get('user/profile', function () {

    });
    
    Route::get('/gioi-thieu', function () {
        return view('home.gioithieu')->withError(null);
    });
    
    Route::post('/gioi-thieu','UserAttackController@gioithieu');
    
//    Route::get('/danh-sach-quan-tam', function () {
//        return view('actions.danhsachquantam')->withError(null);
//    });
//    
//    Route::post('/danh-sach-quan-tam','ActionController@danhsachquantam');
    
    Route::get('/danh-sach-khach-hang','UserAttackController@danhsachkhachhang');
    
    Route::get('/sao-ke-giao-dich','UserAttackController@saokegiaodich');
    
    Route::resource('tinh', 'TinhController');

    Route::resource('huyen', 'HuyenController');

    Route::resource('duong', 'DuongController');

    Route::resource('pho', 'PhoController');

    Route::resource('huong', 'HuongController');

    //Route::resource('loaibds', 'LoaibdsController');

    Route::resource('duan', 'DuanController');

    Route::resource('tinbds', 'TinBDSController');

    Route::resource('yeucaunha', 'YeucaunhaController');
    
    Route::resource('question-and-answer', 'QuestionAndAnswerController');

    Route::post('yeucaunha/follow', 'YeucaunhaController@addfollowproduct');
    Route::post('yeucaunha/remove_follow', 'YeucaunhaController@removefollowproduct');

    Route::get('/trang-ca-nhan/', 'HomeController@trangcanhan');
    
    Route::get('/quan-ly-tai-khoan/', 'HomeController@quanlytaikhoan');
    Route::get('/quan-ly-yeu-cau', 'ActionController@quanlyyeucau');
    Route::get('/create-yeu-cau', 'ActionController@taoyeucau');
    
    
    Route::get('/thong-bao/', 'ActionController@thongbao');
    
    Route::get('/nap-tien/', 'ActionController@naptien');

    Route::post('/updateUser', 'HomeController@updateUser');
    
    Route::post('/send-email','HomeController@sendemail');
});

Route::group(['middleware' => ['web']], function () {
    Route::get('/test-new', 'HomeController@testnew');
    Route::get('/test-login', 'ActionController@login');
    Route::get('/danh-sach-yeu-cau', 'ActionController@khachquantam');
    
    Route::post('/tim-kiem-nguoi-mua/', 'HomeController@timkiemnguoimua');
    Route::post('/tim-kiem-nha-ban/', 'HomeController@timkiemnhaban');
    Route::get('/tim-kiem-nguoi-mua/', 'HomeController@timkiemnguoimua');
    Route::get('/tim-kiem-nha-ban/', 'HomeController@timkiemnhaban');
    
    Route::get('/them-yeu-cau','UserAttackController@themyeucau');
    Route::get('/them-nguoi-dung','UserAttackController@themnguoidung');
    
    Route::get('/nha-da-ban', 'ActionController@nhadaban');
    Route::get('/nha-chua-duyet', 'ActionController@nhachuaduyet');
    Route::get('/khach-quan-tam', 'ActionController@khachquantam');
    Route::get('/duyet-tin', 'ActionController@duyettin');
    Route::post('/active', 'ActionController@activetin');
    Route::post('/remove', 'ActionController@removetin');
    
    Route::get('/terms-of-service', 'ActionController@termsofservice');
    Route::get('/price-policy', 'ActionController@pricepolicy');
    Route::get('/privacy-policy', 'ActionController@privacypolicy');
    Route::get('/questions-and-answers', 'ActionController@questionsandanswers');
    Route::get('/nganluong_d62bafcde7c1225038e4c17973210c22.html','ActionController@nganluongactive');
    Route::get('/payment_success', 'ActionController@thanhtoanthanhcong');
    Route::get('/google2fa952a6c07ee729.html', 'ActionController@googleSearch');
    
    Route::get('/baokim_1a06a47dfa253674.html', 'HomeController@baokim');
    Route::get('/thanhtoanbaokim', 'ActionController@thanhtoanbaokim');
    Route::post('/tienhanhthanhtoan', 'ActionController@tienhanhthanhtoan');
    Route::get('/thanh-toan-thanh-cong', 'ActionController@thanhtoanthanhcong');
    Route::get('/success', 'ActionController@success');

    Route::get('/tim-nguoi-mua', 'HomeController@timNguoiMua');
    Route::get('/post-fb', 'HomeController@postFB');
    Route::get('/tim-nha-ban', 'HomeController@index');
    Route::get('/xay-dung', 'HomeController@xaydung');
    Route::get('/kien-truc', 'HomeController@kientruc');
    Route::get('/noi-that', 'HomeController@noithat');
    Route::get('/ngoai-that', 'HomeController@ngoaithat');
    Route::get('/send-email', 'HomeController@sendemail');
    Route::get('/khu-vuc/{id}', 'KhuvucController@show');
    Route::get('/loaibds/{id}', 'KhuvucController@loaitin');
    Route::post('/updateCall', 'HomeController@updateCall');
    Route::get('/getHuyen/{id}', 'HuyenController@getHuyen');
    Route::get('/getPhuong/{id}', 'HuyenController@getPhuong');
    Route::get('/getDuong/{id}', 'HuyenController@getDuong');
    Route::get('/getDuan/{id}', 'HuyenController@getDuan');
    //Route::get('/yeucaunha/danhsachnha', 'YeucaunhaController@danhsachnha');
});
