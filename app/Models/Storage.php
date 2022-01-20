<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    use HasFactory;

    public function products()
    {
        $this->hasMany('App\Models\Product', 'storage_id');
    }
}
