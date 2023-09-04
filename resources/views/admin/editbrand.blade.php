<!DOCTYPE html>
<html lang="en">
<title></title>

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

            <!-- edit brand -->
            <form action="{{url('/')}}/admin_editbrands_req" method="POST"> @csrf
  <div class="mb-3">
    <label for="brandname" class="form-label">Edit Brand Name</label>
    <input type="text" class="form-control" name="brandname" id="brandname" value="{{$brand->bname}}" required>
  </div>
  <input type="hidden" name="brandid" id="brandid" value="{{$brand->brandid}}" required>
  <button type="submit" class="btn btn-success">Save</button>
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




