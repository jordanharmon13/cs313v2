<?php
require '../dynamic/header.php';

?>
<h1 id="main-h1">Assignments</h1>

<div>

  <h2>Sign In</h2>
	<form id="sign-in-form" action="#" method="post">
		<div class="form-group">
			<label for="sign-up-email">Email address</label>
			<input type="email" class="form-control" id="sign-up-email" placeholder="Email">
		</div>
		<div class="form-group">
			<label for="sign-up-password">Password</label>
			<input type="password" class="form-control" id="sign-up-password" placeholder="Password">
		</div>
		<div class="form-group">
			<input type="button" class="btn btn-default" form="sign-in-form">
		</div>
	</form>

<?php require '../dynamic/footer.php'; ?>