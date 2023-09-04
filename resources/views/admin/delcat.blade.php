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

         <br>

         <p class="fs-2 text-center" style="color:red;">DELETE CATEGORY</p>

         <br>
         <br>

            <div class="col-1"></div>
            <div class="col-10">

            <!-- delete category -->
            <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Category Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <th scope="row">{{$cat->catid}}</th>
      <td>{{$cat->catname}}</td>
      <td>
        <form action="{{url('/')}}/admin_deletecategory_req" method="POST"> @csrf
            <input type="hidden" name="delid" value="{{$cat->catid}}">
            <button type="submit" class="btn btn-danger" style="color:white;">DELETE</button>
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



