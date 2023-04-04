<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Follow extends Model
{
    //
}
class FollowUser extends Pivot
{
    protected $fillable = ['follow_id', 'follower_id'];

    protected $table = 'follows';

}
//参考→https://qiita.com/mitsu-0720/items/0c2fcdd367e8a6c5999c
