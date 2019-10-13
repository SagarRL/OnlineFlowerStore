<?php
    session_start();

    if(isset($_SESSION['id'])) {
        $username = $_SESSION['username'];
        $userId = $_SESSION['id'];
        //echo "Welcome, {$username}!";
    } else {
        header('Location: index.php');
        die();
    }

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css_2/droplist.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
</head>
<body>

<div data-role="page" id="pageone">
  <div data-role="header">
    <h1>NotesAPP</h1>
  </div>

  <div data-role="main" class="ui-content">
    <h2>Engineering Physics</h2>
    <div data-role="collapsible">
    <h4>Unit 1</h4>
    <ul data-role="listview">
      <li><a href="http://localhost/notesappweb/login/pdf/web/viewer.html">Phishing Notes</a></li>
      <li><a href="#">Topic 2</a></li>
    </ul>
    </div>

    <div data-role="collapsible">
    <h4>Unit 2</h4>
    <ul data-role="listview">
       <li><a href="#">Topic 1</a></li>
       <li><a href="#">Topic 2</a></li>
       <li><a href="#">Topic 3</a></li>
    </ul>
    </div>

    <div data-role="collapsible">
    <h4>Unit 3</h4>
    <ul data-role="listview">
      <li><a href="#">Topic 1</a></li>
      <li><a href="#">Topic 2</a></li>
      <li><a href="#">Topic 3</a></li>
      <li><a href="#">Topic 4</a></li>
    </ul>
    </div>
  
 <div data-role="collapsible">
    <h4>Unit 4</h4>
    <ul data-role="listview">
      <li><a href="#">Topic 1</a></li>
      <li><a href="#">Topic 2</a></li>
      <li><a href="#">Topic 3</a></li>
      <li><a href="#">Topic 4</a></li>
    </ul>
    </div>

 <div data-role="collapsible">
    <h4>Unit 5</h4>
    <ul data-role="listview">
      <li><a href="#">Topic 1</a></li>
      <li><a href="#">Topic 2</a></li>
      <li><a href="#">Topic 3</a></li>
      <li><a href="#">Topic 4</a></li>
    </ul>
    </div>
  </div>
	
  <div data-role="footer">
    <h1>IIGNIS INNOVATIONS LAB</h1>
  </div>
</div> 

</body>
</html>	