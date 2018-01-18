<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Mail;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'password', 'phone', 'phone2', 'address', 'coins', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public static function ActiveUser($id){
        if($id!=''){
            $user = User::find($id);
            if($user !== null){
                $user->active = 1;
                $user->update();
            }
        }
    }
    
    public static function ActiveUserByEmail($email){
        if($email!=''){
            $user = User::where('email', $email)->first();
            if($user !== null){
                $user->active = 1;
                $user->update();
            }
        }
    }
    
    public static function DeActiveUserByEmail($email){
        if($email!=''){
            $user = User::where('email', $email)->first();
            if($user !== null){
                $user->active = 0;
                $user->update();
                
                // send email thong bao nap tien
                Mail::send('emails.thongbaonaptien', [], function($message) use ($email) {
                    $message->from('admin@chodatso.com', 'chodatso.com');
                    $message->to($email)->subject('Thông báo từ chodatso.com');
                });
            }
        }
    }
}
