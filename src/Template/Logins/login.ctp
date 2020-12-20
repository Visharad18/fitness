<?php echo $this->element('navbar');
echo ' <!DOCTYPE html>
<html>
<!-- Login dialog box -->
		<section class="container" id="login">
				<h1>Login</h1>
				<form id="login-form" action="php/login.php" method="post">
					<div class="field">
						<label>Email</label>
						<input type="email" name="Email" maxlength="200" required />
					</div>
					
					<div class="field">
						<label>Password</label>
						<input type="password" name="Password" maxlength="50" required />
					</div>
					
					<button type="submit" class="button button-block"/>Login</button>
				</form>
		</section>
</html> '

?>