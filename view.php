<?php

	require_once('dbconfig.php');
	global $con;
	
	$query = "SELECT * FROM userinfo";
	$result = mysqli_query($con, $query);
	$rows = mysqli_affected_rows($con);
	if($rows == 0)
	{
		die();
	}

	?>
	<div id="msgs"></div>
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
	    success: function(data, status,  xhr)
	    {
	    	$.get("view.php", function(data)
	    	{	
	    		$("#table_content").html(data); 
	    	});
	    	$('#msgs').fadeOut(2000).html(data);
	    }
	});
}); // delete close

	$('.edit').click(function() {
		alert('clicked');
		var id = $('.edit').attr('id');
		$.ajax({
	    url : "edit.php",
	    type: "POST",
	    data : { id: id },
	    success: function(data, status,  xhr)
	    {
	    	$('#records_content').fadeOut(2000).html('loading');
	    	$.get("view.php", function(data)
	    	{
	    		$("#table_content").html(data); 
	    	});
	    }
	});
}); // edit close
</script>