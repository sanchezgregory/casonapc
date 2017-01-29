<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'description','code','department_id'
    ];
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function status()
    {
        return $this->hasMany(Status::class);
    }
}
