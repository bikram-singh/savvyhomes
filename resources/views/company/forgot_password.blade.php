<!DOCTYPE html>
<html lang="en">
<head>
  <title>Savvy Homes</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3">
  <h2 style="text-align:center;">Forgot Password</h2>
@if($errors->first('message'))
<div class="alert alert-danger">
{{ $errors->first('message') }}
</div>
@endif
@if(isset($success))
<div class="alert alert-success">
{{ $success }}
</div>
@endif
  <form method="post" class="form-horizontal" action="" style="margin-top:40px;">
	{{ csrf_field() }}
    <div class="form-group">
      <label class="control-label col-sm-2" for="email">Email:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
	<span style="color:red;">{{ $errors->first('email') }}</span>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <a href="{{ url('company/login') }}">Login</a>
      </div>
    </div>
  </form>
</div>
</div>
</div>

</body>
</html>

