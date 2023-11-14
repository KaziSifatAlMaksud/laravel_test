<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
<form action="{{ route('mail.send') }}" method="POST">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail">Email</label>
            <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
        </div>
    </div>
    <div class="form-group">
        <label for="inputAddress">Address</label>
        <input type="text" class="form-control" id="inputAddress" name="address" placeholder="1234 Main St">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputCity">City</label>
            <input type="text" class="form-control" id="inputCity" name="city">
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Send</button>
</form>

    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>