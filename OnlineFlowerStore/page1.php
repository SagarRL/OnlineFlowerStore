<?php
session_start();
include_once 'dbconnection1.php';
?>

<html>
<head>
  <title>Welcome to The Secret Garden</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
.navbar {
width: 100%;
 position: fixed;
  top: 0;
  width: 100%;

font-size: 12px;
overflow: auto;
position:relative;
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

.carousel-inner img{
	width: 100%;
	margin:auto;
	height: 200px;
	
	
}

@media (max-width:600px){
	.carousel-caption{
		display:none;
	}
}
.carousel-caption{
	top:30%;
	bottom:auto;
	
}



 footer {
      background-color: #555;
      color: white;
      padding: 5px;
    }
	
.carousel-caption	h1{
    
    text-shadow: 6px 6px 8px black;
	font-size:60;
	
	
}
.carousel-caption	p{
    
    text-shadow: 6px 6px 8px black;
	font-size:20px;
	
	
	
}
  



    
</style>
</head>
<body >


<nav class="navbar navbar-inverse" role="navigation">
	<div class="sticky">
		
	<div class="collapse navbar-collapse" id="navbar1" >
	<div class="left-side">
		<ul class ="nav navbar-nav">
		<li><a href="aboutus.html">About Us</a></li>
	</ul>
	</div>
		<div class="right-side">	
			<ul class="nav navbar-nav" name="abt">
			<?php if(isset($_SESSION['usr_id'])){   ?>
			<li ><font size="3"><p class="navbar-text glyphicon glyphicon-user ">  <?php echo $_SESSION['usr_name'];?></p></font></li>
		
		<li  ><a href="logout.php"><span class="glyphicon glyphicon-log-out"> </span>  Log Out</a></li>
</ul>
		</div>
<div class="left-side">
		<ul class ="nav navbar-nav">
<li  ><a href="products.php">  Flowers</a></li>
</ul>
</div>
<div class="right-side">
		<ul class ="nav navbar-nav">		
		<?php } else { ?>
			<li  ><a href="login.php"><span class="glyphicon glyphicon-log-in"> </span>  Sign In</a></li>
			<li  ><a href="signup.php"><span class="glyphicon glyphicon-user"> </span>  Sign Up</a></li>
		<?php } ?>
			</ul>
</div>
		</div>
	
	</div></div>
</nav>
</div>
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    
	</ol>

   
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="ft4.jpg" alt="Image">
        <div class="carousel-caption">
          <h1><font color="maroon" size="25"><i>The Secret Garden</i></font></h1>
		  <h3><p><i>Make your day special with Flowers..</i></p></h3>
          
        </div>      
      </div>

      <div class="item">
        <img src="ft2.jpg" alt="Image">
        <div class="carousel-caption">
        <h1> <font color=""><i>The Secret Garden</i></font></h1>
		  <h3><p><i>Make your day special with Flowers..</i></p></h3>
         
        </div>      
      </div>
	  <div class="item">
        <img src="ft6.jpg" alt="Image">
        <div class="carousel-caption">
           <h1><font color="maroon" ><i>The Secret Garden</i></font></h1>
 <h3><p><i><font color="black">Make your day special with Flowers..</font></i></p></h3>
		   </div>      
      </div> <div class="item">
        <img src="ft7.png" alt="Image">
        <div class="carousel-caption">
        <h1><font color="maroon" ><i>The Secret Garden</i></font></h1>
		 <h3><p><i>Make your day special with Flowers..</i></p></h3>
        </div>      
      </div>
   </div>
   

	
   
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>
<?php if(isset($_SESSION['usr_id'])){   ?>
  <div class="container text-center">    
  <br>
  <div class="row">
    <div class="col-sm-4">
      <img src="pf1.jpg" class="img-responsive" style="width:100%" alt="Image">
     
    </div>
    <div class="col-sm-4"> 
      <img src="pf2.jpg" class="img-responsive" style="width:100%" alt="Image">
        
      </div> 
	  <div class="col-sm-4"> 
      <img src="pf4.jpg" class="img-responsive" style="width:100%" alt="Image">
        
      </div>
   </div><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="pf10.jpg" class="img-responsive" style="width:100%" alt="Image">
     
    </div>
    <div class="col-sm-4"> 
      <img src="pf5.jpg" class="img-responsive" style="width:100%" alt="Image">
        
      </div> 
	  <div class="col-sm-4"> 
      <img src="pf6.jpg" class="img-responsive" style="width:100%" alt="Image">
      
        
      </div>
   </div><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="pf7.jpg" class="img-responsive" style="width:100%" alt="Image">
     
    </div>
    <div class="col-sm-4"> 
      <img src="pf9.jpg" class="img-responsive" style="width:100%" alt="Image">
        
      </div> 
	  <div class="col-sm-4"> 
      <img src="pf8.jpg" class="img-responsive" style="width:100%" alt="Image">
    
        
      </div>
   </div>
</div>
<?php }
else { ?>

  <div class="container text-center">    
  <br>
  <div class="row">
    <div class="col-sm-4">
      <img src="f24.gif" class="img-responsive" style="width:100%" alt="Image">
     
    </div>
    <div class="col-sm-4"> 
      <img src="f25.gif" class="img-responsive" style="width:100%" alt="Image">
        
    </div>
    <div class="col-sm-4">
      <div class="well">
       <p><marquee><font size="6" color="pink">Just living is not enough..one must have sunshine,freedom,and a little flower.</font></marquee></p>
      </div>
       <div class="well">
       <p><font size="5" color="pink"><b>Flowers like friends they bring color to your world!!!</b></font></p>
      </div>
    </div>
  </div>
</div><br>

<?php }?>


</br>
		<footer class="container-fluid text-center">
   <div class="grid__item one-third small--one-whole large--text-right">
            <div itemscope itemtype="http://schema.org/LocalBusiness">
              © 2017,
<span itemprop="name">The Secret Garden</span>
              <br>
<p itemprop="address" >
              <span itemprop="telephone">8123786849</span>
  <br>
<span itemprop="streetAddress">Yellhanka</span>,
<span itemprop="addressLocality">Banglore</span>,

<span itemprop="postalCode">560064</span>
              </p>
</div>
</footer>
<script>

</script>
<script src="js/jquery-1.10.2.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>


