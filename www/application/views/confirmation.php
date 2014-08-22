<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang=""en">
<head>
<?php include("includes/header.php"); ?>
	<title>Confirmation HelloWorld</title>
</head>
<body>
<img src="<?php echo base_url('/image/logo-nav.png'); ?>" width="111" height="95" alt="helloWorld Logo">
<div id="container">
	<h1>An account has been added for&nbsp;<?php echo $first_name; ?>&nbsp;<?php echo $last_name; ?></h1>
</div>
<a href="/registration">Enter a new user</a>
</body>
<?php include("includes/footer.php"); ?>
