<?php
	include('header.html');
?>	

<script>
function validate_password_reset() {
	if((document.getElementById("password").value == "") && (document.getElementById("Confirm Password").value == "")) {
		document.getElementById("validation-message").innerHTML = "Please enter new password!"
		return false;
	}
	return true
}
</script>
<form name="frmForgot" id="frmForgot" method="post" onSubmit="return validate_password_reset();">

	<?php if(!empty($success_message)) { ?>
	<div class="success_message"><?php echo $success_message; ?></div>
	<?php } ?>

	<div id="validation-message">
		<?php if(!empty($error_message)) { ?>
	<?php echo $error_message; ?>
	<?php } ?>
	</div>

	<div class="field-group">
		<div><label for="Password">Password</label></div>
		<div><input type="password" name="password" id="member_password" class="form-control"> Or</div>
	</div>
	
	<div class="field-group">
		<div><label for="email">Confirm Password</label></div>
		<div><input type="password" name="confirm_password" id="confirm_password" class="form-control"></div>
	</div>
	
	<div class="field-group">
		<div><input type="submit" name="reset-password" id="reset-password" value="Submit" 
			class="btn btn-primary"></div>
	</div>	
</form>
<?php
	include('footer.html');
?>					