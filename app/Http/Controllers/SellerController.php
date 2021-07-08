<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Product;
use App\Models\Seller;
use App\Http\Controllers\Auth;
use DB;

class SellerController extends Controller
{

    public function getSeller(){
        $sellers=Seller::all();
              //->sortByDesc('id');
        return view("seller",compact("seller"));

    }

    public function index()
    {
        
        $sellers = Seller::all();
        return view('seller', compact('sellers'));          
    }   

    public function update($id){
       // $user = Auth::user();

        $seller = Seller::find($id);
        return view('updateS',compact('seller'))->with('title','Edit Seller');
    }
   
    public function store(Request $request){

         // return $request->file('image');

        $this->validate(request(),[
            's_name' => 'required',
            's_surname' => 'required',
            's_phone' => 'required',
        ]);

        $image_name = time().'.'.$request->image->extension();  
    
        $request->image->move(public_path('images'), $image_name);
       
        $seller = new Seller();
        $seller->s_name = request('s_name');
        $seller->s_surname = request('s_surname');
        $seller->s_phone = request('s_phone');

        
        $seller->save();
        
        $seller->phSell()->create(['image' => "/images/".$image_name]);

        $notification = [
            'message' => 'Seller is added successfully.!',
            'alert-type' => 'success'
        ];
        return redirect('/seller')->with($notification);
    }
    
    public function edit(Request $request,$id){
        

        $this->validate(request(),[
            's_name' => 'required',
            's_surname' => 'required',
            's_phone' => 'required',
        ]);

        
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $data =array(
            's_name' => $request->input('s_name'),
            's_surname' => $request->input('s_surname'),
            's_phone' => $request->input('s_phone'),
            
        );

        $seller = Seller::find($id);
       if($request->hasFile('image')){
        //    $request->validate([
        //      'image' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //    ]);
            $seller->phSell()->update(['image' => "/images/".$imageName]);
       }
       $seller->s_name = $request->s_name;
       $seller->s_surname = $request->s_surname;
       $seller->s_phone = $request->s_phone;
       $seller->save();




        //Seller::where('id',$id)->update($data);
        
        return redirect('/seller');
    }
   
    public function destroy($id){
        Seller::where('id',$id)->delete($id);
        $notification = [
            'message' => 'Seller Deleted Sucessfully.!',
            'alert-type' => 'info'
        ];
        return redirect('/seller')->with($notification);
    }
    public function delete2($id){

        $sellers = Seller::find($id);
        $sellers ->delete();
        $sellers->phSell->delete();

        return redirect('/seller');
    }


}
