<?php

namespace App\Models;
use Http\App\Models\Mark;
use Http\App\Models\Product;
use Http\App\Models\Seller;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{

    protected $fillable = [
        'id','table_name', 'table_id', 'image',
    ];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function products()
    {
        return $this->morphToMany(Product::class, 'phPro');
    }

    public function markProduct()
    {
        return $this->morphToMany(Mark::class, 'pivot');
    }
    public function marks()
    {
        return $this->morphTo();
    }
    
    public function seller()
    {
        return $this->morphTo();
    }
}
