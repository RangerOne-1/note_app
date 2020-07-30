<?php


	$servername = "127.0.0.1";
	$username = "newuser";
	$password = "toor";
	$dbname = "notetaking";

	if($_COOKIE['session']){
		//set cookie value 
		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		//query database
		$sql = "SELECT id,email from users where email='".$_COOKIE['session']."'";
		
		$result = $conn->query($sql) or die($conn->error);
		$row = $result->fetch_assoc();
		$id = $row['id'];

		if($row['email']==$_COOKIE['session'])
		{

		}
		else
		{
			header("Location: index.php");
		}

		$conn->close();
	}
	else
	{
		header("Location: index.php");
	}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Edit</title>
</head>
<body style="background-color: #272525;font-family: courier;color:white">
	<div class="container" style="margin-top: 60px;">
		
		<form action='form.php' method="get">
	  <div class="form-group">
	    <div class="modal-header">

		<?php

		echo '<h2 class="modal-title" id="exampleModalLabel" style="margin-bottom: 10px;"><input class="form-control form-control-lg" style="background-color: #272525;color:white;height:50px;font-size: 25px;" type="text" name="title" placeholder="Title" value="'.$_GET["title"].'" ></h2>
			        <b><small class="form-text text-muted">Keep title under 30 characters. </small></b>
			      </div>
	  </div>
	  <div class="form-group">
	    <div class="modal-body">
			        <textarea class="form-control" role="textbox" id="textarea" name="textarea" rows="16"style="background-color: #272525;color:white;font-size: 18px;" placeholder="take Note...">'.base64_decode($_GET["note"]).'</textarea>
			        <input type="hidden" name="id" value="'.$_GET['id'].'">
			      </div>';
		?>
			        
	  </div>
	  <button type="submit" name="save" class="btn btn-primary">Submit</button>
	  <button type="submit" name="delete" class="btn btn-primary" style="float: right;background-color: red">Delete</button>
	</form>
	</div>

	<?php


		if(isset($_REQUEST['save'])){


			$conn = new mysqli($servername, $username, $password,$dbname);

			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$title=$_REQUEST['title'];
			$note=$_REQUEST["textarea"];
			$id=$_REQUEST["id"];


			$sql = "UPDATE notes SET title='$title',note='$note' where id='$id'";
			$result = $conn->query($sql) or die($conn->error);

			$conn->close();
			header("Location: note.php");
			
		}
		elseif (isset($_REQUEST['delete'])) {

			$conn = new mysqli($servername, $username, $password,$dbname);

			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$id=$_REQUEST["id"];

			$sql = "DELETE from notes where id='$id'";
			$result = $conn->query($sql) or die($conn->error);
			
			$conn->close();

			header("Location: note.php");

		}
	?>





</body>
</html>