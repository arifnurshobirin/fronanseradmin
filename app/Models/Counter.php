<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Counter extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function edcs()
    {
        return $this->hasMany(Edc::class);
    }

    public function computer()
    {
        return $this->hasOne(Computer::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function consolidates()
    {
        return $this->hasMany(Consolidate::class);
    }
}
