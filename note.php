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

	//LOGIN
	elseif($_POST['email']){
		if($_POST['password']){



		//connect to database

		$servername = "127.0.0.1";
		$username = "newuser";
		$password = "toor";
		$dbname = "notetaking";

		// Create connection
		$conn = new mysqli($servername, $username, $password,$dbname);

		// Check connection
		if ($conn->connect_error) {
		  die("Connection failed: " . $conn->connect_error);
		}

		//query database
		$sql = "SELECT id,email,password from users";
		$result = $conn->query($sql);

		$conn->close();
		
		while($row = $result->fetch_assoc()){
			if($row['email']==$_POST["email"]){
				break;
			}
			else{
				header("Location: index.php");
			}
		}

			if($_POST['email']==$row['email']){
				if($_POST['password']==$row['password']){
					session_start();
					setcookie("session", $_POST['email'], time()+3600);
					header("Location: note.php");
				}
				else{
					header("Location: index.php");
				}
			}
			else{
			header("Location: index.php");
			}
		}
		else{
		header("Location: index.php");
		}
	}
	else{
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
	<title>Notes</title>
	<style type="text/css">
		.sidenav {
		  height: 100%;
		  width: 60px;
		  position: fixed;
		  z-index: 1;
		  top: 0;
		  left: 0;
		  background-color: red;
		  overflow-x: hidden;
		  padding-top: 20px;
		}

		.sidenav a {
		  padding: 6px 8px 6px 16px;
		  text-decoration: none;
		  font-size: 25px;
		  color: #818181;
		  display: block;
		}

		.sidenav a:hover {
		  color: #f1f1f1;
		}

		.main {
		  margin-left: 160px; 
		  font-size: 28px;
		  padding: 0px 10px;
		}

		.active-pink-4 input[type=text]:focus:not([readonly]) {
		  border: 1px solid #f48fb1;
		  box-shadow: 0 0 0 1px #f48fb1;
		}


		.body {
			height: 100vh;
		}

		.column-wrapper {
			height: inherit;
			display: flex;
			flex-flow: row wrap;
			justify-content: space-around;
		}

		@media screen and (max-height: 450px) {
		  .sidenav {padding-top: 15px;}
		  .sidenav a {font-size: 18px;}
		}
	</style>
</head>
<body style="font-family: courier;background-color: #272525;color: white">
	<div class="sidenav">
       <center><a class="btn btn-info btn-lg" style="width:60px;background-color:#272525;color:white;border:0px solid red;border-radius: 0px;">
         <span class="glyphicon glyphicon-plus-sign" type="button" data-toggle="modal" data-target="#Formtitle" style="margin-top: 5px;margin-right: 8px;"></span> 
       </a></center>
</div>


<div style="margin-left: 62px;">
	
		<!-- Form -->
		<div class="modal fade" id="Formtitle" tabindex="-1" role="dialog" aria-labelledby="Formtitle" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content" style="background-color: #272525;height: 610px;">
		      <form method='post'>
		      	<div class="modal-header">
			        <h2 class="modal-title" id="exampleModalLabel"><input class="form-control form-control-lg" style="background-color: #272525;color:white;height:50px;font-size: 25px;" type="text" name="title" placeholder="Title" required></h2>
			        <small id="emailHelp" class="form-text text-muted">Keep title under 30 characters. </small>
			      </div>
			      <div class="modal-body">
			        <textarea class="form-control" role='textbox' id="textarea" name='textarea' rows="16" style="background-color: #272525;color:white;font-size: 18px;" placeholder="take Note..."></textarea>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        			<button type="submit" name='button1' class="btn btn-primary" style="background-color: red;">Save changes</button>
			    </div>
		      </form>
		    </div>
		  </div>
		</div>


		<div class="active-pink-3 active-pink-4 mb-4">
		  <center><input class="form-control" type="text" placeholder="Search" style="width:75%;margin-top: 30px;height: 50px;font-size: 25px;color: white;background-color:#272525; " aria-label="Search"></center>
		</div>
		<?php

		if(isset($_POST['button1'])){

			//set cookie value 
			// Create connection
			$conn = new mysqli($servername, $username, $password,$dbname);

			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			$sql = "SELECT * from notes WHERE title='".$_POST['title']."'";
			$result = $conn->query($sql) or die($conn->error);
			if(mysqli_num_rows($result)==0)
			{
				$sql = "INSERT into notes(title,note,user_id) VALUES('".$_POST['title']."','".$_POST['textarea']."','".$id."')";
				$result = $conn->query($sql) or die($conn->error);
			}


			//query database

			// for querying
			/*$sql = "SELECT * from notes";
			
			$result = $conn->query($sql) or die($conn->error);
			while($row=$result->fetch_assoc()){
				echo $row['title'];
				echo "<br>";
				echo nl2br($row['note']);

<input type="hidden" name="id" value="'.$row["id"].'">  


				<i class="fa fa-trash" style="color:red;font-size: 30px;float: right"></i>

			}

			*/
			$conn->close();
		}
	?>

	<script type="text/javascript">
			
		function editnote(a,b,c){
			document.location = "form.php?id="+a+"&title="+b+"&note="+c;
		}

	</script>
	<div class="column-wrapper">
		<?php

			$conn = new mysqli($servername, $username, $password,$dbname);

			// Check connection
			if ($conn->connect_error) {
			  die("Connection failed: " . $conn->connect_error);
			}

			//query database
			// <a class="btn btn-primary" onclick="editnote('.$row["id"].',\''.$row["title"].'\',\''.$row["note"].'\')" style="margin-top: 30px;">Edit</a>		
			$sql = "SELECT * FROM notes where user_id=(SELECT id FROM users where email='".$_COOKIE['session']."')";
			
			$result = $conn->query($sql) or die($conn->error);
			while($row = $result->fetch_assoc())
			{
				echo '<div class="card" style="width: 500px;border:2px solid white;border-radius:2%;margin-top: 80px;">
				  <div class="card-body" style="margin:20px 30px 20px 30px;">
				    <center><h5 class="modal-header" wrap="hard" name="reading_text" style="font-size: 24px;margin-bottom: 20px;">'.$row["title"].'</h5></center>
				    <p class="card-text" style="font-size: 18px;">'.nl2br($row['note']).'</p>
				    <a class="btn btn-primary" href="form.php?id='.$row["id"].'&title='.$row["title"].'&note='.base64_encode($row["note"]).'" style="margin-top: 30px;">Edit</a>		
				    <a class="btn btn-primary" href="form.php?id='.$row["id"].'&delete=true'.'" style="margin-top: 30px;float:right;background-color:red">delete</a>
				  </div>
				</div>';
			}

		?>

	</div>
</div>
</body>
</html>
