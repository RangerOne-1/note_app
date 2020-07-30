<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Taking Note</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<style>
    .login-form {
        width: 330px;
    	margin: 30px auto;
    }
    .login-form h2 {
        font-size: 19px;
        margin-bottom: 15px;
        text-align: center;
    }
    .login-form form {        
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);        
        margin-bottom: 10px;
		padding: 30px;
    }
    .login-form .avatar {
        width: 90px;
        margin-bottom: 20px;
    }
    .login-form .form-control, .login-form .btn {
        min-height: 38px;        
    }
    .login-form input[type="email"] {
        border-radius: 2px 2px 0 0;
    }
    .login-form input[type="password"] {
        border-radius: 0 0 2px 2px;
        margin-top: -1px;
    }
	.login-form input.form-control:focus {
        position: relative;
        z-index: 2;
    }
    .login-form .btn {        
        font-size: 15px;
		font-weight: bold;
		border-radius: 2px;
    }
</style>
</head>
<body style="background-color:black;color: white;font-family: courier">
<div class="container" style="margin-top: 170px;">
	<div class="login-form" style="width:450px;">
    <center><h1>Login</h1></center>
    <form action="note.php" method="post" style="border-radius: 5%;background-color: #BECAC7">
        <div class="text-center">
            <img src="https://rangerone-1.github.io/images/newpic.png" class="img-circle avatar" alt="Avatar">
        </div>        
        <div class="form-group">
            <input type="email" name="email" class="form-control" style="border-radius: 5%" placeholder="Email" required="required"><br>
            <input type="password" name="password" class="form-control" style="border-radius: 5%" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-danger btn-block">Sign In</button>
        </div>
    </form>
</div>
</div>
</body>
</html>