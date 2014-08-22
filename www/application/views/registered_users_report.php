<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang=""en">
	<head>
<?php include("includes/header.php"); ?>
		<title>Registered Users Report - HelloWorld</title>
	</head>
<body>
<img src="<?php echo base_url('/image/logo-nav.png'); ?>" width="111" height="95" alt="helloWorld Logo">
<div id="container">
	<h1>Registered Users Report</h1>
<div id="register_users_rpt" class="dataTables_wrapper">
		<table border="1" class="display" id="tblRegUsersRpt" cellspacing="0" cellpadding="0" border="0">
				<thead>
						<tr><th>First Name</th><th>Last Name</th><th>Address1</th><th>Address2</th><th>City</th><th>State</th><th>ZIP</th><th>Country</th><th>Date</th></tr>
				</thead>
				<tbody>
<?php if (count((array)$users)): ?>
<?php foreach ($users as $user): ?>
						<tr><td><?php echo $user->first_name; ?></td><td><?php echo $user->last_name; ?></td><td><?php echo $user->address1; ?></td><td>
							<?php echo $user->address2; ?></td><td><?php echo $user->city; ?></td><td><?php echo $user->state; ?></td><td>
							<?php echo $user->zip; ?></td><td><?php echo $user->country; ?></td><td><?php echo $user->date_created; ?></td></tr>
<?php endforeach; ?>
<?php endif; ?>
				</tbody>
		</table>
</div><!-- register_users_rpt -->
</div><!-- container -->
<a href="/registration">Enter a new user</a>
<script>
$(document).ready(function() {
    $('#tblRegUsersRpt').dataTable( {
        "order": [[ 8, "desc" ]]
    } );
} );
</script>
</body>
<?php include("includes/footer.php"); ?>
