<?php

	require_once('dbconfig.php');
	global $con;

	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	if(!empty($name) && !empty($username) && !empty($password))
	{
		$query = $con->prepare("INSERT into userinfo (name, username, password) VALUES (?,?,?)");

		$query->bind_param('sss',$name,$username,$password);

		$result = $query->execute();

		if($result) 
		{
	        echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success">1 Record Added!</div>';
	    }
	    else
	    	exit(mysqli_error($con));    
	}