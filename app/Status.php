<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Status extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'device_status_user')
            ->withPivot('device_id', 'observation')
            ->withTimestamps();
    }
    public function devices()
    {
        return $this->belongsToMany(Device::class, 'device_status_user')
            ->withPivot('user_id', 'observation')
            ->withTimestamps();
    }

    public function userDevice($id)
    {
        $user = DB::table('device_status_user')
            ->join('users', 'device_status_user.user_id', '=', 'users.id')
            ->select('users.username')
            ->where('device_status_user.id',$id)
            ->value('username');

        return $user;
    }

}

