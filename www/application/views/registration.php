<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang=""en">
	<head>
<?php include("includes/header.php"); ?>
		<title>Registration HelloWorld</title>
	</head>
<body>
<img src="<?php echo base_url('/image/logo-nav.png'); ?>" width="111" height="95" alt="helloWorld Logo">
<div id="container">
	<h1>Welcome to Registration!</h1>
<?php if(validation_errors()) { ?>
	<h3> Please correct the below errors and resubmit the form</h3>
	<div class="alert error alert-warning">
		<?php echo validation_errors(); ?><br />
</div>
<?php } ?>
<?php echo form_open('/registration/register', array('id' => 'register')); ?>
		<fieldset><legend>Personal Info</legend>
			<div class="hw_input"><label class="inline">First Name</label><input type="text" name="first_name" id="first_name" value="<?php echo set_value('first_name'); ?>" /></div>
			<div class="hw_input"><label class="inline">Last Name</label><input type="text" name="last_name" id="last_name" value="<?php echo set_value('last_name'); ?>" /></div>
			<div class="hw_input"><label class="inline">Address1</label><input type="text" name="address1" id="address1" value="<?php echo set_value('address1'); ?>" /></div>
			<div class="hw_input"><label class="inline">Address2</label><input type="text" name="address2" id="address2" value="<?php echo set_value('address2'); ?>" /></div>
			<div class="hw_input"><label class="inline">City</label><input type="text" name="city" id="city" value="<?php echo set_value('city'); ?>" /></div>
			<div class="hw_input"><label class="inline">State</label><input type="text" name="state" id="state" value="<?php echo set_value('state'); ?>" /></div>
			<div class="hw_input"><label class="inline">ZIP</label><input type="text" name="zip" id="zip" value="<?php echo set_value('zip'); ?>" /></div>
			<div class="hw_input"><label class="inline">Country</label><input type="text" name="country" id="country" value="<?php echo set_value('country'); ?>" /></div>
			<br /><br />
			<span class="button red"><input type="submit" value="Save Registration" id="btnSaveRegistration" /></span>
		</fieldset>
	</form>
</div>
	<script>
$(document).ready(
function() {
	$('#register').validate({
		onkeyup: false,
		rules: {        
			first_name: {
				required: true,
				maxlength: 100
			},       
			last_name: {
				required: true,
				maxlength: 100,
				remote:
				{
					url: 'check_user',
					type: "post",
					data: {
						first_name: function()
						{
							return $('#first_name').val();
						},
						last_name: function()
						{
							return $('#last_name').val();
						}
					}
				}
			},
			address1: {
				required: true,
				maxlength: 100
			},
			city: {
				required: true,
				maxlength: 100
			},
			state: {
				required: true,
				maxlength: 2
			},
			zip: {
				required: true,
				maxlength: 10,
				remote:
				{
					url: 'check_zip',
					type: "post",
					data: {
						zip: function()
						{
							return $('#zip').val();
						}
					}
				}
			},
			country: {
				required: true,
				remote:
				{
					url: 'check_country',
					type: "post",
					data: {
						country: function()
						{
							return $('#country').val();
						}
					}
				}
			}
		}, //rules
		messages: {
			first_name: {
				required: "This field is required",
				max: "Please enter 100 or less characters"
				},
			last_name: {
				required: "This field is required",
				max: "Please enter 100 or less characters",
				remote: "This user already exists"
				},
			address1: {
				required: "This field is required",
				max: "Please enter 100 or less characters"
				},
			city: {
				required: "This field is required",
				max: "Please enter 100 or less characters"
				},
			state: {
				required: "This field is required",
				max: "Please enter 2 or lesscharacters"
				},
			zip: {
				required: "This field is required",
				max: "Please enter 10 or less characters",
				remote: "Please enter a valid zipcode ex: 54321 or 54321-1234"
				},
			country: {
				required: "This field is required",
				max: "Please enter 2 or less characters",
				remote: "Country must be set to US"
				}
			}
	}); // register.validate
}); // ready
	</script>
</body>
<?php include("includes/footer.php"); ?>
