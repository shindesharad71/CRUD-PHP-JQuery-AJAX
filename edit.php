<?php

	require_once('dbconfig.php');
	global $con;
	
	$id = $_POST['id'];

	if(empty($id))
	{
		die();
	}
	$query = "SELECT * FROM userinfo where id='$id'";
	if (!$result = mysqli_query($con, $query)) {
	        exit(mysqli_error($con));
	    }
	while($row = mysqli_fetch_assoc($result))
	{
		?>
		<div id="link-add" class="form-inline">
			<div class="form-group col-md-3">
				<input type="text" name="name" id="name" value="<?php echo $row['name']; ?>" placeholder="Name" class="form-control input-lg" required />
			</div>
			<div class="form-group col-md-3">
				<input type="text" name="username" id="username" placeholder="Username" class="form-control input-lg" value="<?php echo $row['username']; ?>" required/>
			</div>
			<div class="form-group col-md-3">
				<input type="text" id="password" name="password" placeholder="Password" class="form-control input-lg" value="<?php echo $row['password']; ?>" required />
			</div>
			<div class="form-group col-md-3">
			<button type="button" class="btn btn-primary update" id="<?php echo $row['id']; ?>" name="add">Update Record</button>
			<button type="button" href="javascript:void(0);" class="btn btn-default" id="cancel" name="add" onclick="$('#link-add').slideUp(400);">Cancel</button>
		</div>
	<?php
	}