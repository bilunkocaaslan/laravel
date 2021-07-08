<?php

namespace App\Models;
use Http\App\Models\Product;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    // protected $fillable = [
    //     'id', 'm_name','image' 
    // ];
    protected $table = "marks";

    // protected $guarded = [];
   
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function phMrk()
    {
        return $this->morphOne(Photos::class, 'marks','table_name','table_id');
    }
}
