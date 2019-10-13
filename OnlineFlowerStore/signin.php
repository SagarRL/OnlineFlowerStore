<?php

session_start();

if(isset($_SESSION['usr_id'])!=""){
	header("Location:page1.php");
}

include_once 'dbconnection.php';
if(isset($_POST['login'])); {
	$email = mysquli_real_escape_string($con,$_POST['email']);
	$password = mysquli_real_escape_string($con,$_POST['password']);
	$result = mysqli_query($con,"SELECT * FROM users WHERE email='".$email."' and password='".md5($password)."'");
	
	if($row=mysqli_fetch_array($result)){
		$_SESSION['usr_id']=$row['id'];
		$_SESSION['usr_name']=$row['name'];
		header("Location:page1.php");
		} else{
			$errormsg="Incorrect Email or Password!!";
			
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
	
	<div class="right-side">	
			<ul class="nav navbar-nav" name="abt">
			<li class="active" ><a href="signin.php"><span class="glyphicon glyphicon-log-in"> </span>  Sign In</a></li>
			<li  ><a href="signup.php"><span class="glyphicon glyphicon-user"> </span>  Sign Up</a></li>
			</ul>

	</div>
	</div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4 well">
            <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="loginform">
                <fieldset>
                    <legend>Login</legend>
                    
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input type="text" name="email" placeholder="Your Email" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="name">Password</label>
                        <input type="password" name="password" placeholder="Your Password" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <input type="submit" name="login" value="Login" class="btn btn-primary" />
                    </div>
                </fieldset>
            </form>     
       <center>   
        New User? <a href="register.php">Sign Up Here</a></center>
        <span class="text-danger"><?php if (isset($errormsg)) { echo $errormsg; } ?></span>
		</div>
		</div>
    </div>
    
  