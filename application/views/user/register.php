<form action="<?php echo current_url(); ?>" method="post" class="form">
	<div class="formRow">
		<label>Username</label>
		<input type="text" id="username" class="textInput" name="username" placeholder="" value="" />
	</div>
	<div class="formRow">
		<label>Email Address</label>
		<input type="text" id="email" class="textInput" name="email" placeholder="bill@windowsrulez1337.com" value="" />
	</div>
	<div class="formRow">
		<label>First Name</label>
		<input type="text" id="fname" class="textInput" name="fname" placeholder="" value="" />
	</div>
	<div class="formRow">
		<label>Last Name</label>
		<input type="text" id="lname" class="textInput" name="lname" placeholder="" value="" />
	</div>
	<div class="formRow">
		<label>Address</label>
		<input type="text" id=""address class="textInput" name="address" placeholder="" value="" />
	</div>
	<div class="formRow">
		<label>Address Line 2</label>
		<input type="text" id="address2" class="textInput" name="address2" placeholder="" value="" />
	</div>
	<div class="formRow">
		<label>City</label>
		<input type="text" id="city" class="textInput" name="city" placeholder="" value="" />
	</div>
	<div class="formRow">
		<label>State</label>
		<?php $states = $this->config->item('states'); ?>
		<select name="state" id="state" class="selectInput">
			<?php if ( isset($target_user->state) && array_key_exists($target_user->state, $states) ) : ?>
				<option value="<?php echo $target_user->state; ?>"><?php echo $states[$target_user->state]; ?></option>
			<?php endif; ?>
			
			<?php foreach ( $states as $abbreviation=>$state ) : ?>
			<option value="<?php echo $abbreviation; ?>"><?php echo $state; ?></option>

			<?php endforeach; ?>
		</select>
	</div>
	<div class="formRow">
		<label>Zip</label>
		<input type="text" id="zip" class="textInput" name="zip" placeholder="" value="" />
	</div>
	<div class="formRow">
		<label>Phone Number</label>
		<input type="text" id="phone" class="textInput" name="phone" placeholder="(XXX) XXX-XXXX" value="" />
	</div>
	<div class="formRow">
		<label>Password</label>
		<input type="password" id="password" class="textInput" name="password" value="" />
	</div>
	<div class="formRow">
		<label>Confirm Password</label>
		<input type="password" id="confirm_password" class="textInput" name="confirm_password" value="" />
	</div>
	<div class="formRow">
		<input type="submit" id="submit" class="submit" name="register" value="Register" />
	</div>
</form>