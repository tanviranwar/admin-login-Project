<?php include 'header.php';
		include 'lib/user.php';
		$user = new User();
?>
<?php
	$loginmsg = session::get("loginmsg");
	if (isset($loginmsg)) {
		echo $loginmsg;
	}

?>

<!------body text-----></-->
<div class="panel panel-default">
	<div class="panel-heading">
		<h2>User list<span class="pull-right"><strong>Welcome!</strong>
		<?php
			$name = session::get("name");
			if (isset($name)) {
				echo $name;
			}
		?>
		</span></h2>
	</div>
	<div class="panel-body">
		<table class="table table-striped">
			<th width="20%">Serial</th>
			<th width="20%">Name</th>
			<th width="20%">Username</th>
			<th width="20%">Email Address</th>
			<th width="20%">Action</th>

			<tr>
				<td>01</td>
				<td>Tanvir Anwar</td>
				<td>tanvir</td>
				<td>tanvir721@gmail.com</td>
				<td>
					<a class="btn btn-primary" href="profile.php?id=1">View</a>
				</td>
			</tr>

			<tr>
				<td>02</td>
				<td>Sabbir Anwar</td>
				<td>sabbir</td>
				<td>sabbir721@gmail.com</td>
				<td>
					<a class="btn btn-primary" href="profile.php?id=2">View</a>
				</td>
			</tr>

			<tr>
				<td>03</td>
				<td>Tamanna Anwar</td>
				<td>tamanna</td>
				<td>tamanna721@gmail.com</td>
				<td>
					<a class="btn btn-primary" href="profile.php?id=3">View</a>
				</td>
			</tr>

			<tr>
				<td>04</td>
				<td>Nahid Anwar</td>
				<td>nahid</td>
				<td>nahid721@gmail.com</td>
				<td>
					<a class="btn btn-primary" href="profile.php?id=4">View</a>
				</td>
			</tr>

			<tr>
				<td>05</td>
				<td>Sharmin Anwar</td>
				<td>sharmin</td>
				<td>sharmin721@gmail.com</td>
				<td>
					<a class="btn btn-primary" href="profile.php?id=5">View</a>
				</td>
			</tr>
		</table>
	</div>
</div>

<?php include 'footer.php'?>