<!DOCTYPE html>
<html lang="en">
<title>Add New Brand</title>

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

        <!-- add new brand -->
        <form action="{{url('/')}}/admin_addnewbrand_req" method="POST">
 @csrf
            <div class="mb-3">
    <label for="brandName" class="form-label">Add New Brand</label>
    <input type="text" class="form-control" placeholder="Enter new brand name" name="brandName" id="brandName" required>
  </div>
  <button type="submit" class="btn btn-success">ADD</button>
</form>


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

