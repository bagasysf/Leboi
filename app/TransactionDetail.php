<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    protected $guarded = [];

    public function transaction() {
        return $this->belongsTo(Transaction::class);
    }
    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function package() {
        return $this->belongsTo(Package::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
