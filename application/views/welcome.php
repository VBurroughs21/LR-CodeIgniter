<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8">
		<base href="http://localhost:8888/">
		<title>Login & Registration</title>
		<style type="text/css">
			ul {
				list-style-type: none;
			}
			#info {
				display: inline-block;
				margin: 25px 100px;
				width: 300px;
				vertical-align: middle;
			}
		</style>
	</head>
	<body>
		<h3>Welcome <?= $first_name ?> </h3>
		<a href="login/log_off">Log off</a>
		<div id="info">
			<fieldset>
				<legend>User Information</legend>
				<ul>
					<li>First Name:</li>
					<li>Last Name:</li>
					<li>Email Address:</li>
				</ul>
			</fieldset>
		</div>
	</body>
</html>