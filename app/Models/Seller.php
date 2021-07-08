<?php

namespace App\Models;
use Http\App\Models\Product;
use Http\App\Models\Mark;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    // protected $fillable = [
    //     's_id', 's_name', 's_surname', 's_phone','image'
    // ];

    protected $table = "sellers";

    // protected $guarded = [];
   

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function marks()
    {
        return $this->belongsTo(Mark::class, 'mark_id');
    }

    public function phSell()
    {
        return $this->morphOne(Photos::class, 'seller','table_name','table_id');
    }
}
