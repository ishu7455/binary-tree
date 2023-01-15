<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>Signup form</h1>
    <form action="/login" method="post">
      @csrf
        <div class="container">

 <div class="mb-3">
    <label>Email address</label>
    <input type="email" class="form-control" name="email">
 </div>

<div class="mb-3">
    <label>Password</label>
    <input type="password" class="form-control" name="password">
  </div>

  

  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>
  </body>
</html>
