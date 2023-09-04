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

            <!-- edit category form -->

@foreach($cat as $cat)
            <form action="{{url('/')}}/admin_editcategory_req" method="POST">
                @csrf
                <input type="hidden" name="caid" value="{{$cat->catid}}">
  <div class="mb-3">
    <label for="catname" class="form-label">Edit Category Name</label>
    <input type="text" class="form-control" name="catname" id="catname" value="{{$cat->catname}}" required>
  </div>
  <button type="submit" class="btn btn-success">Save</button>
</form>
@endforeach

            </div>
            <div class="col-1"></div>
         </div>

        </div>
      </div>
      <!-- main-panel ends -->

      
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <x-admin.jsfiles /> 
</body>

</html>





