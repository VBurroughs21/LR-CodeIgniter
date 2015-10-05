<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8">
		<base href="http://localhost:8888/">
		<title>Welcome</title>
		<style type="text/css">
			div {
				margin: 25px 100px;
				width: 700px;
				vertical-align: middle;
				padding-left: 50px;
			}
			input {
				display: block;
				width: 250px;
				margin: 10px;
			}
				
		</style>
	</head>
	<body>
		<div id="login">
			<form method="post" action="login/log">
				<fieldset>
					<legend>Login</legend>
<?php 				if ($this->session->flashdata('login_error')) {
						echo $this->session->flashdata('login_error');
					}
?>
					<input type="hidden" name="action" value="login">
					Email:<input type="text" name="email">
					Password:<input type="password" name="password">
					<input type="submit" name="login" value="Login">
				</fieldset>
			</form>
		</div>
		<div id="register">
			<form method="post" action="login/reg">
				<input type="hidden" name="action" value="register">
				<fieldset>
					<legend>Register</legend>
<?php 				if ($this->session->flashdata('reg_error')) {
						echo $this->session->flashdata('reg_error');
					}
?>
					First Name:<input type="text" name="first_name">
					Last Name:<input type="text" name="last_name">
					Email Address:<input type="text" name="email">
					Password:<input type="password" name="password">
					Confirm Password:<input type="password" name="con_password">
					<input type="submit" name="register" value="Register">
				</fieldset>
			</form>
		</div>
	</body>
</html>


