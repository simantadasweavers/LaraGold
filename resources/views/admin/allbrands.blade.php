<!DOCTYPE html>
<html lang="en">
<title>All Brands</title>

<x-admin.cssfiles />


<body>
  <div class="container-scroller">
   
    <x-admin.navbar />
   
  
    <x-admin.sidebar />


      <div class="main-panel">
        <div class="content-wrapper">
         
         <div class="row">
            <div class="col-1"></div>
            <div class="col-10">

            <p class="text-center fs-5">All Brands</p>

                 <!-- all brands  -->
                 <table class="table fs-5">
  <thead>
    <tr>
      <th scope="col fs-5">ID</th>
      <th scope="col fs-5">Name</th>
      <th scope="col fs-5">Edit</th>
      <th scope="col fs-5">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($brand as $brand)
    <tr>
      <th scope="row" class="fs-6">{{$brand->brandid}}</th>
      <td class="fs-6">{{$brand->bname}}</td>
      <td class="fs-6">
        <form action="{{url('/')}}/admin_editbrand" method="post">
        @csrf   
        <input type="hidden" name="brandid" value="{{$brand->brandid}}" required>
            <button type="submit" class="btn btn-warning" style="color:black;">Edit</button>
        </form>
      </td>
      <td class="fs-6">
      <form  action="{{url('/')}}/admin_deletebrand" method="post"> @csrf
            <input type="hidden" name="brandid" value="{{$brand->brandid}}" required>
            <button type="submit" class="btn btn-danger" style="color:white;">Delete</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

            </div>
            <div class="col-1"></div>
         </div>

        </div>
      </div>
      <!-- main-panel ends -->

      
    </div>
    <!-- page-body-wrapper ends -->
  </div>
   <x-admin.jsfiles /> 
</body>

</html>






