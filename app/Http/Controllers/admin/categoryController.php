<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use App\Models\Parentcategory;

class categoryController extends Controller
{
   function redirect(Request $request){
    if(session()->get('adminMail')){
        
        $cat = Parentcategory::all();

        return view('/admin/addnewcatory',['cat'=>$cat]);
      }
      else{
          return view('/admin/login');
      }
   }
   
   function new(Request $request){

        $name = $request['categoryname'];
        $parent = $request['parentCategory'];
     
        $request->validate([
            'categoryname' => 'required',
            'parentCategory' => 'required'
        ]);

    if(session()->get('adminMail')){
        
        $exist = DB::table('category')->where('catname',$name)->get()->count();
        
        if($exist == 0){
            $cat = new Category; 
            $cat->catname = $name;
            $cat->parentcategoryid = $parent;
            $cat->save();

            return redirect('/admin_allcategory');
        }
        else{
            return "<font style='color:blue;font-size:20px;'>Category Name already exists</font>"; 
        }

      }
      else{
          return view('/admin/login');
      }
    
   }

   function all(){
    if(session()->get('adminMail')){

        $cat = DB::table('category')
        ->join('parentcategory', 'parentcategory.parentid', '=', 'category.parentcategoryid')                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          
        ->orderBy('catid', 'DESC')->get();
        
        return view('/admin/allcategories',['cat'=>$cat]); 
      }
      else{
          return view('/admin/login');
      }
      
    }

    function editcatRedirect(Request $request){
        if(session()->get('adminMail')){
            $id = $request['catid'];

            $cat = DB::table('category')->where('catid',$id)->get();
            
            return view('/admin/editcategory',['cat'=>$cat]); 
    
          }
          else{
              return view('/admin/login');
          }
        
    }

    function editCategory(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        if(session()->get('adminMail')){
            $id = $request['caid'];
            $name = $request['catname'];

            $cat = Category::find($id);
            $cat->catname = $name;
            $cat->save();

            return redirect('/admin_allcategory'); 
    
          }
          else{
              return view('/admin/login');
          }
    }

    function delCatRediect(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        if(session()->get('adminMail')){
         $id = $request['deletecatid'];

            $cat = Category::find($id);
    
            return view('/admin/delcat',['cat'=>$cat]);
    
          }
          else{
              return view('/admin/login');
          }
        
    }

    function delCategory(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        if(session()->get('adminMail')){
            $id = $request['delid'];

            $cat = Category::find($id);
            $cat->delete();
            
            return redirect('/admin_allcategory'); 
    
          }
          else{
              return view('/admin/login');
          }
        
    }

}
