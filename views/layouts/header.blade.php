
<!DOCTYPE html>
<html>
<head>
	<title>Laravel Login and Registration System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	   {{HTML::style('http://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css')}}
   
	<style>
		body{
			padding-top: 70px;
		}
	</style>
</head>
<body>
<div class="page">
	<div class="container-fluid">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Laravel</a>
					@if ( Auth::check() and Auth::user()->username == 'donald')
					<a class="navbar-brand" href="/admin/users">Users</a>
					@endif
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav navbar-right">
						@if (Auth::check())
						<li><a href="/profile">{{ Auth::user()->username }}</a></li>
						<li><a href="/logout">Log Out</a></li>
						@else
						<li><a href="/login">Login</a></li>
						<li><a href="/register">Sign Up</a></li>
						@endif
					</ul>

				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				@if(Session::has('message'))
				<div class="alert-box success">
					<h2>{{ Session::get('message') }}</h2>
				</div>
				@endif
			</div>
		</div>
	</div>