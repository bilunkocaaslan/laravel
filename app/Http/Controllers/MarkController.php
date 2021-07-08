<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mark;
use App\Models\Product;
use App\Models\Seller;
use App\Models\Photos;
use App\Http\Controllers\Auth;
use DB;


class MarkController extends Controller
{

    public function getMark(){
        $marks=Mark::all();
        return view("mark",compact("marks"));

    }

    public function getDeneme(){
        $marks=Mark::all();
        return view("deneme",compact("marks"));

    }

    public function index()
    {
        
        $marks = Mark::all();
        return view('mark', compact('marks'));          
    }  
    
    
    public function update($id){
       
         $mark = Mark::find($id);
         return view('uppdate',compact('mark'))->with('title','Edit Mark');
     }
    


     public function store(Request $request){

         //return $request->file('image');

         $this->validate(request(),[
             'm_name' => 'required',
         ]);
        
          $imageName = time().'.'.$request->image->extension();  
    
          $request->image->move(public_path('images'), $imageName);

         $mark = new Mark();
         $mark->m_name = $request->m_name;
         $mark->save();

         $mark->phMrk()->create(['image' => "/images/".$imageName]);
         $mark->images = "/images/".$imageName;


         return response()->json($mark);
     }

     public function edit(Request $request,$id){
       
        $this->validate(request(),[
            'm_name' => 'required',
           
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        

        $data =array(
            'm_name' => $request->input('m_name'),
            
        );
      
       $mark = Mark::find($id);
       if($request->hasFile('image')){
        //    $request->validate([
        //      'image' => 'required|file|mimes:jpg,png,jpeg,gif,svg|max:2048',
        //    ]);
            $mark->phMrk()->update(['image' => "/images/".$imageName]);
       }
       $mark->m_name = $request->m_name;
       $mark->save();

        return redirect('/mark');

}


     public function delete($id){

         $marks = Mark::find($id);
         $marks ->delete();
         $marks->phMrk->delete();
         return redirect('/mark');
     }

     public function deleteMrk($id){

        $marks = Mark::find($id);
        $marks ->delete();
        $marks->phMrk->delete();
        return response()->json($mark);
        
    }
}















































