<?php
$filepath = realpath(dirname(__FILE__));
include_once $filepath.'/lib/session.php';
session::init(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login page</title>
	<link rel="stylesheet" href="inc/bootstrap.min.css"/>

</head>
<body>
<div class="container">
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Logo</a>
			</div>
			<ul class="nav navbar-nav pull-right">
				<li><a href="profile.php">Profile</a></li>
				<li><a href="">Logout</a></li>
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>
			</ul>
		</div>
	</nav>