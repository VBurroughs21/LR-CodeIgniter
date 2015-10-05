<!DOCTYPE>
<html>
	<head>
		<meta charset="UTF-8">
		<base href="http://localhost:8888/">
		<title>Login & Registration</title>
		<link rel="stylesheet" type="text/css" href="<?= base_url('assets/welcome.css') ?>" />
	</head>
	<body>
		<h3>Welcome <?= $this->session->userdata('first_name') ?> </h3>
		<a href="login/log_off">Log off</a>
		<div id="info">
			<fieldset>
				<legend>User Information</legend>
				<ul>
					<li>First Name: <?= $this->session->userdata('first_name') ?></li>
					<li>Last Name: <?= $this->session->userdata('last_name') ?></li>
					<li>Email Address: <?= $this->session->userdata('email') ?></li>
				</ul>
			</fieldset>
		</div>
	</body>
</html>