<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<title>New View</title>
</head>
<body>
	<!-- <h1>This is the New View</h1>
	<table border="1">
		<tr>
			<th>S.no</th>
			<th>Post Title</th>
			<th>Post description</th>
			<th>Post Author</th>
			<th>Post Date</th>
		</tr>
		<?php 
			$c = 0;
			foreach($posts as $post){
				$c++;
				echo '					
					<tr>
						<td>'.$c.'</td>
						<td>'.$post->post_title.'</td>
						<td>'.$post->post_description.'</td>
						<td>'.$post->post_author.'</td>
						<td>'.$post->post_date.'</td>
					</tr>';
			}
		?>
	</table> -->
	
	<!-- Crear tabla -->
	<form method="post" action="<?php echo base_url('index.php/New_con/create');?>">
	  <input type="text" name="table">
	  <input type="submit" name="">
	</form> 
	
</body>
</html>