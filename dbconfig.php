<?php

	global $con;

	$con = mysqli_connect('localhost','root','','db');

	if(!$con)
	{
		echo 'unable to connect with db';
		die();
	}