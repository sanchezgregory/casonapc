<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'description','code','department_id'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'device_status_user')
            ->withPivot('status_id', 'observation')
            ->withTimestamps();
    }
    public function statuses()
    {
        return $this->belongsToMany(Status::class, 'device_status_user')
            ->withPivot('user_id', 'observation')
            ->withTimestamps();
    }

}
