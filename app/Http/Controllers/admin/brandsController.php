<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;
use DB;


class brandsController extends Controller
{
    function redirect(){
        if(session()->get('adminMail')){
           
            return view('admin/addnewbrand');
          }
          else{
              return view('/admin/login');
          }
    }

    function save(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        if(session()->get('adminMail')){
            $name = $request['brandName'];

            $exist = DB::table('brands')->where('bname',$name)->get()->count();
            
            if($exist == 0){
            $brand = new Brands;
            $brand->bname = $name;
            $brand->save();

            return redirect('/admin_allbrands');
            }
            else{
                return "<font style='color:blue;font-size:20px;'>Brand Name already exists!!</font>";
            }

            
          }
          else{
              return view('/admin/login');
          }
    }

    function all(){
        if(session()->get('adminMail'))
          {
            $brand = DB::table('brands')->orderBy('brandid', 'DESC')->get();
            
            return view('admin/allbrands',['brand'=>$brand]);
          }
          else{
              return view('/admin/login');
          } 
    }

    function edit(Request $request){
          if(session()->get('adminMail'))
          {
            $id = $request['brandid'];

            $brand = Brands::find($id);
            
            return view('admin/editbrand',['brand'=>$brand]);
          }
          else{
              return view('/admin/login');
          }

    }

    function editBrand(Request $request){
        if(session()->get('adminMail')){
            $name = $request['brandname'];
            $id = $request['brandid'];

            $brand = Brands::find($id);
            $brand->bname = $name;
            $brand->save();

            return redirect('/admin_allbrands');
          }
          else{
              return view('/admin/login');
          }
    }

    function deleteBrand(Request $request){
        if(session()->get('adminMail')){
            $id = $request['brandid'];
            
            $brand = Brands::find($id);

            return view('/admin/delbrand',['brand'=>$brand]);
          }
          else{
              return view('/admin/login');
          }
        
    }

    function delete(Request $request){
        if(session()->get('adminMail')){
            $id = $request['brandid'];
            
            $brand = Brands::find($id);
            $brand->delete();

            return redirect('/admin_allbrands');
          }
          else{
              return view('/admin/login');
          }
        
    }

}
