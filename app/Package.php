<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Package extends Model
{
    use Notifiable, SearchableTrait;

    protected $guarded = [];

    public function searchableAs()
    {
        return 'packages.index';
    }
}
