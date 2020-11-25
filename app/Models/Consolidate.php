<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Consolidate extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded = [];

    public function cashier()
    {
        return $this->belongsTo(Cashier::class);
    }

    public function counter()
    {
        return $this->belongsTo(Counter::class);
    }

    public function banknote()
    {
        return $this->belongsTo(Banknote::class);
    }

    public function coin()
    {
        return $this->belongsTo(Coin::class);
    }
}
