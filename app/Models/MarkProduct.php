<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarkProduct extends Model
{
    protected $fillable = [
        'id', 'mark_id','product_id', 'price', 'stock' 
    ];

    public function products()
    {
        return $this->belongsTo(Product::class,'product_id','price','stock');
    }

    public function marks()
    {
        return $this->belongsTo(Mark::class,'mark_id');
    }

    public function pivot()
    {
        return $this->morphTo();
    }
}
