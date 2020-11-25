<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coin extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function consolidate()
    {
        return $this->hasOne(Consolidate::class);
    }
}
