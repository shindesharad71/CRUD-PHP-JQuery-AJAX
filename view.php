<?php

	require_once('dbconfig.php');
	global $con;
	
	$query = "SELECT * FROM userinfo order by id DESC";
	$result = mysqli_query($con, $query);
	$rows = mysqli_affected_rows($con);
	if($rows == 0)
	{
		echo '<div class="text-center">no records found! click on add button to add records</div>';
		die();
	}

	?>
	<table class="table table-striped">
		<tr class="info">
			<th>ID</th>
			<th>Name</th>
			<th>Username</th>
			<th>Password</th>
			<th>Action</th>
		</tr>
	<?php

	while($row = mysqli_fetch_assoc($result))
	{
		echo '
		<tr>
			<td>'.$row['id'].'</td>
			<td>'.$row['name'].'</td>
			<td>'.$row['username'].'</td>
			<td>'.$row['password'].'</td>
			<td><button id="'.$row['id'].'" class="edit btn btn-info">Edit</button> <button class="del btn btn-danger" id="'.$row['id'].'">Delete</button></td>
		</tr>';
	}
		echo '</table>';
?>
<script type="text/javascript">
	$('.del').click(function() {
		var id = $(this).attr('id');
		$.ajax({
	    url : "delete.php",
	    type: "POST",
	    data : { id: id },
	    success: function(data)
	    {
	    	$('#records_content').fadeOut(1100).html(data);
	    	$.get("view.php", function(data)
	    	{	
	    		$("#table_content").html(data); 
	    	});
	    }
	});
}); // delete close

	$('.edit').click(function() {
		var id = $(this).attr('id');
		$('#show-add').hide();
		$.ajax({
	    url : 'edit.php',
	    type: 'POST',
	    data : { id: id },
	    success: function(data)
	    {
    		$("#link-add").html(data);
    		$('#link-add').show();
	    }
	});
}); // edit close

</script>