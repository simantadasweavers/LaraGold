
<!DOCTYPE html>
<html lang="en">
<title>All Products</title>

<x-admin.cssfiles />


<body>
  <div class="container-scroller">
    

    <x-admin.navbar />
   
  
    <x-admin.sidebar />


      <div class="main-panel">
        <div class="content-wrapper">
         
        <table class="table">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Product Name</th>
      <th scope="col">Parent Category</th>
      <th scope="col">Child Category</th>
      <th scope="col">Brand</th>
      <th scope="col">Price</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>

  @foreach($product as $product)
  <tr>
      <th scope="row"> <img src="productimages/{{$product->img1}}" style="max-height:100px;max-width:150px;" alt=""></th>
      <td style="font-size:14px;">{{$product->pname}}</td>
      <td style="font-size:14px;">{{$product->parentname}}</td>
      <td style="font-size:14px;">{{$product->catname}}</td>
      <td style="font-size:14px;">{{$product->bname}}</td>
      <td style="font-size:14px;">{{$product->disprice}}/<del>{{$product->price}}</del></td>
      <form action="{{url('/')}}/admin_update_product"> @csrf <td class="tdata"> <input type="hidden" name="prodid" value="{{$product->prodid}}" required> <button type="submit" class="btn btn-warning" style="color:black;">Edit</button> </td></form>
      <form action=""> @csrf <td class="tdata"> <input type="hidden" name="prodid" value="{{$product->prodid}}" required> <button type="submit" class="btn btn-danger" style="color:white;">Delete</button> </td></form>
    </tr>
    @endforeach

  </tbody>
</table>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->


      </div>
      <!-- main-panel ends -->

      
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  
</body>

<x-admin.jsfiles />

</html>



