<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Photos;
use App\Http\Controllers\Auth;
use DB;

class ProductController extends Controller
{

    public function getProduct(){
        $products=Product::all()->load('phPro');
              //->sortByDesc('id');
        return view("index",compact("products"));

    }
    public function getProduct1(){
        $products=Product::all()
              ->sortByDesc('price');
        return view("home",['products' =>$products]);

    }

    // public function index()
    // {
        
    //     $products=Product::all()->load('phPro');
    //     return view('index', compact('products'));          
    // }   

    public function update($id){
       // $user = Auth::user();

        $product = Product::find($id);
        return view('update',compact('product'))->with('title','Edit Product');
    }
   
    public function store(Request $request){

        // return $request->file('image');

        $this->validate(request(),[
            'p_name' => 'required',
            'price' => 'required',
            'stock' => 'required',
           
        ]);

        $imageName = time().'.'.$request->image->extension();  
    
        $request->image->move(public_path('images'), $imageName);
        
       
        $product = new Product();
        $product->p_name = request('p_name');
        $product->price = request('price');
        $product->stock = request('stock');
        
        
        $product->save();
        
        $product->phPro()->create(['image' => "/images/".$imageName]);
        $notification = [
            'message' => 'Product is added successfully.!',
            'alert-type' => 'success'
        ];
        return redirect('/index')->with($notification);
    }
    
    public function edit(Request $request,$id){
      

        $this->validate(request(),[
            'p_name' => 'required',
            'price' => 'required',
            'stock' => 'required',
            
           
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data =array(
            'p_name' => $request->input('p_name'),
            'price' => $request->input('price'),
            'stock' => $request->input('stock'), 
            
        );

        $product = Product::find($id);
       if($request->hasFile('image')){
        //    $request->validate([
        //      'image' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //    ]);
            $product->phPro()->update(['image' => "/images/".$imageName]);
       }
       $product->p_name = $request->p_name;
       $product->price = $request->price;
       $product->stock = $request->stock;
       $product->save();
        
   
        //Product::where('id',$id)->update($data);
        return redirect('/product');
    }
   
    public function destroy($id){
        Product::where('id',$id)->delete($id);
        $notification = [
            'message' => 'Product Deleted Sucessfully.!',
            'alert-type' => 'info'
        ];
        return redirect('/product')->with($notification);
    }

    public function delete1($id){

        $products = Product::find($id);
        $products ->delete();
        $products->phPro->delete();
        
        

        return redirect('/product');
    }



    function sortName()
{
    $products=Product::all()
              ->sortByDesc('p_name');
        return view("home",['products' =>$products]);

}

function sortPrice()
{
    $products=Product::all()
              ->sortByDesc('price');
        return view("home",['products' =>$products]);

}

function sortStock()
{
    $products=Product::all()
              ->sortByDesc('stock');
        return view("home",['products' =>$products]);

}

}
