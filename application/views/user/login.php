<form action="<?php echo current_url(); ?>" method="post" class="form">
	
	<dl class="form-item">
		<dt><label for="username">Username</label></dt>
		<dd><input type="text" name="username" id="username"  /></dd>
	</dl>
	<dl class="form-item">
		<dt><label for="password">Password</label></dt>
		<dd><input type="password" name="password" id="password" class="form-item" /></dd>
	</dl>
	<dl>
		<dt></dt>
		<dd><input type="submit" name="submit" class="btn btn-primary" id="submit" value="Login" /></dd>
	</dl>
	<input type="hidden" name="redirect" value="<?php echo (!empty($_GET['redirect'])) ? htmlspecialchars($_GET['redirect']) : ''; ?>" />
</form>