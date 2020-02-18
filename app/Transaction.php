<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = [];

    public function transactionDetails() {
        return $this->hasMany(TransactionDetail::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
