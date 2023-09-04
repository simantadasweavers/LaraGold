<!DOCTYPE html>
<html lang="en">
  <title>Add New Category</title>

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

            <!-- add new category form -->
            <form action="{{url('/')}}/admin_newcategory_req" method="POST">
 @csrf
 <div class="mb-3">
    <label for="parentCategory" class="form-label">Parent Category</label>
   <span style="color:red;"> @error('parentCategory')  {{$message}} @enderror </span>
    <select class="form-select" name="parentCategory" aria-label="select parent category of this sub category" required>
 <option value="">Open Menu</option>
    @foreach($cat as $cat)
  <option value="{{$cat->parentid}}">{{$cat->parentname}}</option>
  @endforeach
</select>
  </div>
            <div class="mb-3">
    <label for="categoryname" class="form-label">Enter New Category</label>
    <input type="text" class="form-control" placeholder="Enter new category name" name="categoryname" id="categoryname" required>
  </div>
  <button type="submit" class="btn btn-success">ADD</button>
</form>

            </div>
            <div class="col-1"></div>
         </div>

        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->


   
        <!-- partial -->
      </div>
      <!-- main-panel ends -->

      
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <x-admin.jsfiles />
</body>

</html>