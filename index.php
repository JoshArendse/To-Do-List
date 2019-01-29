<?php 

// includes server for connection////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

include_once 'server.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>To-Do-list</title>
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

    <div class="heading">
        <h2 title>My To-Do-List</h2>
    </div>

    <form method="post" action="index.php" class="input_form">

        <?php if (isset($errors)) { ?>
        <p><?php echo $errors; ?></p>
        <?php } ?>
        <input type="text" name="task" class="task_input">
        <button type="submit" name="submit" id="add_btn" class="add_btn">Add</button>
    </form>

    <table>

	<thead>
		<tr>
			<th>No.</th>
			<th>Action</th>
			<th style="width: 60px;">Remove</th>
		</tr>
	</thead>

	<tbody>
		<?php 
		
		// select task from list if page is refreshed////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

		$tasks = mysqli_query($db, "SELECT * FROM list");

		$i = 1; 
		
        while ($row = mysqli_fetch_array($tasks)) { ?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td class="task"> <?php echo $row['task']; ?> </td>
				<td class="delete"> 
					<a href="index.php?del_task=<?php echo $row['id'] ?>"><img src="img/trash.png" alt="trash"></a> 
				</td>
			</tr>
		<?php $i++; } ?>	
	</tbody>
</table>
    
    
</body>
</html>