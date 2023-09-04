<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Brands;
use App\Models\Parentcategory;
use App\Models\Products;
use DB;

class productController extends Controller
{
    function redirect(Request $request){
        if(session()->get('adminMail')){
            $cat = Category::all();
            $brand = Brands::all();
            $parent = Parentcategory::all();

            return view('/admin/addnewproduct',['cat'=>$cat,'brand'=>$brand,'parent'=>$parent]);
        }
          else{
              return view('/admin/login');
          }
    }

    function save(Request $request){
        // echo "<pre>";
        // print_r($request->all());
       
        $name = $request['productName'];
        $code = $request['productCode'];
        $prentCatNo = $request['parentCat'];
        $childCatNo = $request['childCat'];
        $size  = $request['productSize'];
        $weight  = $request['productWeight'];
        $purity = $request['purity'];
        $brandNo = $request['brandName'];
        $price = $request['price'];
        $disprice = $request['disprice'];
        $makingCharge = $request['makingCharge'];
        $gst = $request['gst'];
        $shortDes = $request['shortdescription'];
        $longDes = $request['productDetail'];
        $quantity = $request['quantity'];
        $cost = $request['shippingCost'];
        $img = $request['img'];
        $img2 = $request['img2'];
        $img3 = $request['img3'];
        $img4 = $request['img4'];

        // if cost null
        if(!$cost){
            $cost = 0;
        }

        // request validate
        $request->validate([
            'productName' => 'required',
            'productCode' => 'required',
            'parentCat' => 'required',
           'childCat' => 'required',
            'productSize' => 'required',
            'productWeight' => 'required',
            'purity' => 'required',
            'brandName' => 'required',
            'price' => 'required',
            'makingCharge' => 'required',
            'gst' => 'required',
            'shortdescription' => 'required',
            'productDetail' => 'required',
            'quantity' => 'required',
            'img' => 'required',
            'img2' => 'required',
            'img3' => 'required',
            'img4' => 'required'
        ]);


        if(session()->get('adminMail')){
      
        $product = new Products;
        $product->pname = $name;
        $product->productcode = $code;
        $product->bid = $brandNo;
        $product->pcid = $prentCatNo;
        $product->cid = $childCatNo;
        $product->size = $size;
        $product->weight = $weight;
        $product->purity = $purity;
        $product->price = $price;
        $product->disprice = $disprice;
        $product->makingchanrge = $makingCharge;
        $product->gst = $gst;
        $product->pdes = $shortDes;
        $product->specification = $longDes;
        $product->quantity = $quantity;
        $product->shipingcost = $cost;

        // img upload
        $public_des_path='public/productimages';
        $fname = $request->file('img');
        $product->img1 =  $fname = $request->file('img')->store('');
        $request->file('img')->storeAs($public_des_path,$fname);
        $request->file('img')->move('productimages/',$fname);

        // img2 upload
        $public_des_path='public/productimages';
        $fname = $request->file('img2');
        $product->img2 =  $fname = $request->file('img2')->store('');
        $request->file('img2')->storeAs($public_des_path,$fname);
        $request->file('img2')->move('productimages/',$fname);

        // img3 upload
        $public_des_path='public/productimages';
        $fname = $request->file('img3');
        $product->img3 =  $fname = $request->file('img3')->store('');
        $request->file('img3')->storeAs($public_des_path,$fname);
        $request->file('img3')->move('productimages/',$fname);

        // img4 upload
        $public_des_path='public/productimages';
        $fname = $request->file('img4');
        $product->img4 =  $fname = $request->file('img4')->store('');
        $request->file('img4')->storeAs($public_des_path,$fname);
        $request->file('img4')->move('productimages/',$fname);

        $product->save();

        return redirect('/admin_dashboard');
            
        }
          else{
              return view('/admin/login');
          }
    }

    function viewall(){
        if(session()->get('adminMail')){
            
            $product = DB::table('products')
            ->join('category', 'products.cid', '=', 'category.catid')
            ->join('parentcategory', 'parentcategory.parentid', '=', 'products.pcid')
            ->join('brands', 'brands.brandid', '=', 'products.bid')
            ->orderBy('products.prodid','DESC')->get();

            return view('admin/allproducts',['product'=>$product]);
          }
          else{
              return view('/admin/login');
          }
    }

    function updateRedirect(Request $request){
        

        if(session()->get('adminMail')){
            $id = $request['prodid'];

            $cat = Category::all();
            $brand = Brands::all();
            $parent = Parentcategory::all();


            $product = Products::find($id);
    
            return view('admin/updateproduct',['cat'=>$cat,'brand'=>$brand,'parent'=>$parent,'prod'=>$product]);  
        }
          else{
              return view('/admin/login');
          }    
       
          
    }

}
