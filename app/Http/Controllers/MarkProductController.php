<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Product;
use App\Models\Seller;
use App\Models\MarkProduct;


class MarkProductController extends Controller
{
    public function markProducts(Request $request){
        $markProducts = Mark::where('m_name',$request->m_name)->get();
        //return view("home",['markProducts' =>$markProducts]);
        return $markProducts;
    }
}
