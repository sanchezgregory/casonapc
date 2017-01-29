<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeviceStatus extends Model
{
    protected $fillable = ['device_id','user_id','status_id'];


}
