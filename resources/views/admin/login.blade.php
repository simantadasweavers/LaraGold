<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="bootstrap-5.3.1/css/bootstrap.min.css">
</head>
<body>

<br>
<br>
<br>


<div class="row">
    <div class="col-2"></div>
    <div class="col-8">

    <!-- login form -->
    <form action="{{url('/')}}/admin_login_req" method="POST">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" placeholder="Enter your email admin" name="email" id="email" value="{{old('email')}}" aria-describedby="enter yyour email admin" required>
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your password admin" name="passwd" id="passwd" value="{{old('passwd')}}" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

    </div>
    <div class="col-2"></div>
</div>

</body>
</html>


