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
  <table class="table">
  <thead>
    <tr>
      <th scope="col">s.no</th>
  </thead>
  <tbody>

   @foreach($users as $user)
    <tr>
   
  <td>{{$user->name}}</td>
  <td>{{$user->email}}</td>
  <td>{{$user->reward}}</td>
     </tr>
    @endforeach
   

  </tbody>
</table>
  </body>
</html>
