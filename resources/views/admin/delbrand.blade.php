<!DOCTYPE html>
<html lang="en">
<title>Delete Brand</title>

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

            <br>


            <p class="fs-4 text-center" style="color:red;">
             Delete Brand
            </p>

            <br>
            <br>


            <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Brand Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">{{$brand->brandid}}</th>
      <td>{{$brand->bname}}</td>
      <td>
        <form action="{{url('/')}}/admin_deletebrand_req" method="POST"> @csrf
            <input type="hidden" name="brandid" value="{{$brand->brandid}}" required>
            <button type="submit" class="btn btn-danger" style="color:white;">Delete Brand</button>
        </form>
      </td>
    </tr>
   
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





