<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    public function category()
    {
        //relasi table model ke tabel package
        return $this->belongsTo(Package::class, 'package_id');
    }
}
