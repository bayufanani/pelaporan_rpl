<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
	<style>
	body{
		background: #2196f3;
	}
	form.center-block{
		background: #ffffff;
		padding: 20px;
		margin-top: 20px;
		border-radius: 5px;
		box-shadow: 0 5px 20px rgba(0,0,0,.2);
		background-color: #efefef;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row">
			<form action="login" method="post" class="center-block" style="width: 320px">
				{{csrf_field()}}
				<img src="{{URL::asset('img/lock.svg')}}" title="Autentikasi Admin" class="center-block" width="98">
				<div class="form-group">
					<label for="username">Username</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" name="username" id="username" placeholder="Username" autofocus>
					</div>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" name="password" id="password" placeholder="Password">
					</div>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-primary btn-block">Login</button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>