<?php

	require_once('dbconfig.php');
	global $con;

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(!empty($name) && !empty($username) && !empty($password))
	{
		$query = "INSERT into userinfo (name, username, password) VALUES ('$name', '$username', '$password')";
		if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success">1 Record Added!</div>';
	}