<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Register</h1>
    <form action="/register" method="post">
      @csrf
        <div class="container">
  <div class="mb-3">
    <label>name</label>
    <input type="text" class="form-control" name="name">
    @if ($errors->has('name'))
    <span class="text-danger">{{ $errors-> first('name')}}</span>
    @endif
 </div>


<div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" name="password">
    @if ($errors->has('password'))
    <span class="text-danger">{{ $errors-> first('password')}}</span>
     @endif
  </div>

  <div class="mb-3">
    <label>Confirm_Password</label>
    <input type="password" class="form-control" name="confirm_password">
    @if ($errors->has('confirm_password'))
    <span class="text-danger">{{ $errors-> first('confirm_password')}}</span>
    @endif
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">position</label>
    <select class="form-control" name="position" id="exampleFormControlSelect1">
      <option value="1">Right</option>
      <option value="0">left</option>
    </select>
  </div>

  <div class="mb-3">
    <label>Direct_sponser</label>
    <input type="text" class="form-control" name="Direct_sponsr">
 </div>
   
 
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
  </body>
</html>