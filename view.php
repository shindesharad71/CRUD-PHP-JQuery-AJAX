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
			<th>Name</th>
			<th>Username</th>
			<th>Password</th>
			<th>Action</th>
		</tr>
	<?php

	while($row = mysqli_fetch_assoc($result))
	{
		?>
		<tr>
			<td><?php echo $row['name']; ?></td>
			<td><?php echo $row['username']; ?></td>
			<td><?php echo $row['password']; ?></td>
			<td><button id="<?php echo $row['id']; ?>" class="edit">Edit</button> | <button class="del" id="<?php echo $row['id']; ?>">Delete</button></td>
		</tr>
	<?php
	}
		echo '</table>';
?>
<script type="text/javascript">
	$('.del').click(function() {
		var id = $('.del').attr('id');
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
		var id = $('.edit').attr('id');
		$.ajax({
	    url : "edit.php",
	    type: "POST",
	    data : { id: id },
	    success: function(data)
	    {
	    	$.get("edit.php", function(data)
	    	{
	    		$("#link-add").html(data); 
	    	});
	    }
	});
}); // edit close
</script>