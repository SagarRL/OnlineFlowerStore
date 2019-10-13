<?php

if(isset($_SESSION['usr_id'])) {
	header("Location: page1.php");
}

include_once 'dbconnection1.php';

$error=false;

if(isset($_POST['signup'])) {
	$name = mysqli_real_escape_string($con,$_POST['name']);
	$email = mysqli_real_escape_string($con,$_POST['email']);
	$password = mysqli_real_escape_string($con,$_POST['password']);
	$cpassword = mysqli_real_escape_string($con,$_POST['cpassword']);

	if(!preg_match("/^[a-zA-Z]+$/",$name)) {
		$error =true;
		$name_error="Name must contain only alphabets and space";
		
	}
	
	if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
		$error=true;
		$email_error="Please Enter Valid Email ID";
		
	}
	
	if(strlen($password)<6){
		$error=true;
		$password_error="Password must be mininum of 6 charcters";
	
	}
	if($password!=$cpassword){
		$error=true;
		$cpassword_error="Password and Confirm Password dosen't match";
	}
	if (!$error){
		if(mysqli_query($con, "INSERT INTO users(name,email,password) VALUES('" . $name . "', '" . $email . "', '" . md5($password) . "')"))
		{
			$successmsg="Successfully Registered! <a href='login.php'>Click here to Login</a>";
		
		}	else{
			$errormsg="Error in Registering...Please try again later!";
			
		}
	
			
}
	}
?>
<html>
<head>
  <title>Sign Up</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.navbar {
width: 100%;



font-size: 12px;
overflow: auto;
}
.navbar a{

text-decoration:none;
display: block;
font-size: 16px;

background-repeat: no-repeat;
padding: 8px 0 8px 24px;
text-align: center;
font-family: roboto;
}

.navbar a:after{
width:0;
height:2px;
background:#fcf;
content:"";
position:absolute;
left:0;
bottom:0;
transition:all linear 0.3s;
}
.navbar a:hover:after{
width:100%;
}
.left-side{
float:left;
}
.right-side{
float:right;
}
body {
	background-image:url("f8.jpg");
	background-size:cover;
	
	
	
	
}
</style>
</head>
<body >


<nav class="navbar navbar-inverse" role="navigation">
	
		
	<div class="collapse navbar-collapse" id="navbar1" >
	<div class="left-side">
		<ul class ="nav navbar-nav">
		<li  ><a href="page1.php"><span class="glyphicon glyphicon-home"> </span> </a></li>
			
		<li><a href="aboutus.html">About Us</a></li>
	</ul>
	</div>
	</div>
</nav>

<div class="container">

	<div class="row">
	
		<div class="col-md-4 col-md-offset-4 well">
		
			<form role="form" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" name="signupform">
			<fieldset>
			<legend>Sign Up</legend>
					
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" name="name" placeholder="Enter Full Name" required value="<?php if ($error) echo $name;?>" class="form-control"/>
						<span class="text-danger"><?php if (isset ($name_error) ) echo $name_error;?></span>
					</div>
							
					<div class ="form-group">
						<label for="name"> Email</label>
						<input type="text" name="email" placeholder="Email" required value="<?php if($error) echo $email; ?>" class="form-control"/>
						<span class="text-danger"><?php if(isset($email_error)) echo $email_error;?></span>
					</div>
					
					<div class ="form-group">
						<label for="name"> Password</label>
						<input type="password" name="password" placeholder="Password" required  class="form-control"/>
						<span class="text-danger"><?php if(isset($password_error)) echo $password_error;?></span>
					</div>
								
					<div class ="form-group">
						<label for="name"> Confirm Password</label>
						<input type="password" name="cpassword" placeholder="Confirm Password" required  class="form-control"/>
						<span class="text-danger"><?php if(isset($cpassword_error)) echo $cpassword_error;?></span>
					</div>
								
					<div class="form-group">
						<center><input type="submit" name="signup" value="Sign Up" class="btn btn-primary"/>
					</center></div>
				</fieldset>
				</form>
			
			
			<center>Already Registered?<a href="login.php"> Login Here</a>
			 </center>
			<span class="text-success"><?php if(isset($successmsg)) { 
				echo $successmsg;} ?></span>
				<span class="text-success"><?php if(isset($errormsg)) { 
				echo $errormsg;} ?></span> 
		</div>
			
		
		</div>
</div>

<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
								
								
								
								
		

