<?php

	require_once('dbconfig.php');
	global $con;
	
	$id = $_POST['id'];

	if(empty($id))
	{
		die();
	}
	$query = "DELETE FROM userinfo where id='$id'";
	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	    echo '<div class="col-md-offset-4 col-md-5 text-center alert alert-success">1 Record Deleted!</div>';