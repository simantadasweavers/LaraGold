<!DOCTYPE html>
<html lang="en">
<title>All Category</title>

<x-admin.cssfiles />

<script src="jquery.js"></script>

<body>
  <div class="container-scroller">
   
    <x-admin.navbar />
   
  
    <x-admin.sidebar />


      <div class="main-panel">
        <div class="content-wrapper">
         
         <div class="row">
            <div class="col-1"></div>
            <div class="col-10">
              
            <p class="text-center fs-5">All Categories</p>

            <br>

            <!-- all category -->
            <table class="table fs-5">
  <thead>
    <tr>
      <th scope="col fs-5">ID</th>
      <th scope="col fs-5">Name</th>
      <th scope="col fs-5">Parent Category</th>
      <th scope="col fs-5">Edit</th>
      <th scope="col fs-5">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($cat as $cat)
    <tr>
      <th scope="row" class="fs-6">{{$cat->catid}}</th>
      <td class="fs-6">{{$cat->catname}}</td>
      <td class="fs-6">{{$cat->parentname}}</td>
      <td class="fs-6">
        <form action="{{url('/')}}/admin_editcategory" method="post">
        @csrf   
        <input type="hidden" name="catid" value="{{$cat->catid}}" required>
            <button type="submit" class="btn btn-warning" style="color:black;">Edit</button>
        </form>
      </td>
      <td class="fs-6">
      <form  action="{{url('/')}}/admin_deletecategory" method="post"> @csrf
            <input type="hidden" name="deletecatid" value="{{$cat->catid}}" required>
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
        <!-- content-wrapper ends -->
        
      </div>
      <!-- main-panel ends -->

      
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <x-admin.jsfiles />
</body>


</html>







