
<!DOCTYPE html>
<html lang="en">
<title>Login Logs</title>

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

            <table class="table">
  <thead>
    <tr>
    <th scope="col">Enroll No</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Date</th>
      <th scope="col">Time(IST)</th>
      <th scope="col">Loc</th>
    </tr>
  </thead>
  <tbody>
    @foreach($log as $log)    
    <tr>
      <th scope="row">{{$log->logid}}</th>
      <td>{{$log->logemail}}</td>
      <td>{{$log->logpassword}}</td>
      <td>{{$log->adate}}</td>
      <td>{{$log->atime}}</td>
      <td>{{$log->aloc}}</td>
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
  <!-- container-scroller -->

 
</body>

<x-admin.jsfiles />

</html>

