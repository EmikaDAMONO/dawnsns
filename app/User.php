<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
     // フォロワー→フォロー
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'followｓ', 'follower_id', 'follow_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follow_users', 'follow_id', 'follower_id');
    }
    //参考→https://qiita.com/mitsu-0720/items/0c2fcdd367e8a6c5999c

}
