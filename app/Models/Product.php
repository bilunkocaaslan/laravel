<?php

namespace App\Models;
use Http\App\Models\Mark;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    // protected $guarded = [];
   

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function marks()
    {
        return $this->belongsTo(Mark::class);
    }

    public function phPro()
    {
        return $this->morphOne(Photos::class, 'imageable','table_name','table_id');
    }
}

