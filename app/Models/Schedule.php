<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Schedule extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }

    public function activity()
    {
        return $this->hasOne(Activity::class);
    }
}
