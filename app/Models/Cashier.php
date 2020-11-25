<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cashier extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    public function activities()
    {
        return $this->belongsToMany(Activity::class);
    }

    public function consolidates()
    {
        return $this->hasMany(Consolidate::class);
    }

    public function scopeSearch($query,$val)
    {
        return $query
        ->where('Employee','like','%'.$val.'%')
        ->Orwhere('Fullname','like','%'.$val.'%')
        ->Orwhere('Position','like','%'.$val.'%')
        ->Orwhere('Status','like','%'.$val.'%');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
