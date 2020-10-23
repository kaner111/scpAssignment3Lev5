<!doctype html>
<html lang="en">
<head>
  <title>SCP Foundation</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="icon" href="images/title_logo.png" type="image" sizes="16x16">
</head>
<body>

<?php include "db.php" ?>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-logo" href="scp-002.html"><img src="images/logo1.jpg" alt="LOGO" height="50" width="55"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Home</a></li>

        <?php foreach($record as $pgcontent): ?>
        <li class="active">
<a href="index.php?page=<?php echo $pgcontent['pg']; ?>"><?php echo $pgcontent['title']; ?></a>
        </li>
        <?php endforeach; ?>
        <a class="btn btn-info" style="margin-top:6px" href="create.php" role="button">Create New Record</a>
      </ul>
      </div>
  </div>
</nav>

<?php
if(isset($_GET['page']))
{
$pg = trim($_GET['page'], "'");

$record = $connection->query("select * from pages where pg='$pg'") or die($connection->error());

$show = $record->fetch_assoc();

$title = $show['title'];
$class = $show['class'];
$containment = $show['containment'];
$description = $show['description'];
$image = $show['image'];

$h1 = $show['h1'];
$p1 = $show['p1'];

$h2 = $show['h2'];
$p2 = $show['p2'];

$h3 = $show['h3'];
$p3 = $show['p3'];

$h4 = $show['h4'];
$p4 = $show['p4'];

//update and delete variables
$id = $show['id'];
$update = "update.php?update=" . $id;
$delete = "db.php?delete=" . $id;


echo"
<div class='container-fluid text-center'>    
  <div class='row content'>
    <div class='col-sm-2 sidenav'>
      <a class='button' style='background-color:#5fd1ab;'>Polytechnic Info</a>
      <br><br>
      <div id='div1' style='width:auto;height:auto;display:none;'>
        <i class='fa fa-graduation-cap'></i> Toi Ohomai Institute of Technology
      </div>
      <br>
      <div id='div2' style='width:auto;height:auto;display:none;'>
        <i class='fa fa-envelope'></i> info@toiohomai.ac.nz
      </div>
      <br>
      <div id='div3' style='width:auto;height:auto;display:none;'>
        <i class='fa fa-phone'></i> 0800 86 46 46
      </div>
        </div>

<div class = 'col-sm-8 text-left'>
<h1 style='text-align: center;'><b>Item #: </b>{$title}</h1>
<h2 style='text-align: center;'><b>Object Class: </b>{$class}</h2>

<div class='content'>
<h3 style='text-align: center;'>Special Containment Procedures:</h3>
<p style='text-align: center;'>{$containment}</p>
</div>
<hr>
<div class='content'>
<h3 style='text-align: center;'>Description:</h3>
<p style='text-align: center;'>{$description}</p>
<p style='text-align: center;'><img src='{$image}' class='img-rounded' height='170px'></p>
</div>
<hr>
<div class='content'>
<h3 style='text-align: center;'>{$h1}</h3>
<p style='text-align: center;'>{$p1}</p>
<hr>
<h3 style='text-align: center;'>{$h2}</h3>
<p style='text-align: center;'>{$p2}</p>
<hr>
<h3 style='text-align: center;'>{$h3}</h3>
<p style='text-align: center;'>{$p3}</p>
<hr>
<h3 style='text-align: center;'>{$h4}</h3>
<p style='text-align: center;'>{$p4}</p>

<a href='{$update}' class='btn btn-warning'> Update </a>
<a href='{$delete}' class='btn btn-danger'> Delete </a>

</div>
    </div>

    <div class='col-sm-2 sidenav'>
      <div class='well'>
        <p>COMP.5210-Web Development and Design</p>
      </div>
      <div class='well'>
        <p>Student Name:<br>Illia Huzanau<br>30025407</p>
      </div>
    </div>
  </div>
</div>
<hr>
<footer class='site-footer'>
  <div class='container'>
    <div class='row'>
      <div class='col-md-8 col-sm-6 col-xs-12'>
        <p class='copyright-text'>Copyright &copy; 2020 All Rights Reserved
        </p>
      </div>

      <div class='col-md-4 col-sm-6 col-xs-12'>
        <ul class='social-icons'>
          <li><a class='google' href='https://www.google.co.nz/search?ei=P9tKX6_sLpfAz7sPnbSN4Ac&q=scp+foundation&oq=scp+fou&gs_lcp=CgZwc3ktYWIQARgAMgcIABCxAxBDMgQIABBDMgQIABBDMgQIABBDMgIIADICCAAyAggAMgIIADICCAAyAggAOgQIABBHOgoIABCxAxCDARBDOgoILhCxAxCDARBDOgQILhBDUPagCljwpApgya0KaABwAXgAgAGkAYgBggWSAQMwLjSYAQCgAQGqAQdnd3Mtd2l6wAEB&sclient=psy-ab&safe=active&ssui=on'><i class='fa fa-google'></i></a></li>
          <li><a class='pinterest' href='https://www.pinterest.nz/SUNAKO666/scp-foundation/'><i class='fa fa-pinterest'></i></a></li>
          <li><a class='instagram' href='https://www.instagram.com/scpfoundationofficial/?hl=en'><i class='fa fa-instagram'></i></a></li>
          <li><a class='youtube-play' href='https://www.youtube.com/results?search_query=scp+foundation+explained'><i class='fa fa-youtube-play'></i></a></li> 
        </ul>
      </div>
    </div>
  </div>
</footer>
<script src='js/script.js'></script>


";
}
else
{
    echo"

<div class='container-fluid text-center'>    
  <div class='row content'>
    <div class='col-sm-2 sidenav'>
      <a class='button' style='background-color:#5fd1ab;'>Polytechnic Info</a>
      <br><br>
      <div id='div1' style='width:auto;height:auto;display:none;'>
        <i class='fa fa-graduation-cap'></i> Toi Ohomai Institute of Technology
      </div>
      <br>
      <div id='div2' style='width:auto;height:auto;display:none;'>
        <i class='fa fa-envelope'></i> info@toiohomai.ac.nz
      </div>
      <br>
      <div id='div3' style='width:auto;height:auto;display:none;'>
        <i class='fa fa-phone'></i> 0800 86 46 46
      </div>
        </div>

<div class = 'col-sm-8 text-left'>
<div class='container-fluid text-center' style='margin-top:3.5em;'> 
    <h1 style='font-family:Arial Black', Gadget, sans-serif;'>Welcome to the SCP Foundation Database Driven WebSite</h1>
    <br>
    <p style='font-family:Tahoma, Geneva, sans-serif;'>Click on the menu links to view an existing records or create a new one</p>
    <p><img src='images/scplo.png' height='250px' style='margin-top:3em;'></p>
    </div>
    </div>

    <div class='col-sm-2 sidenav'>
      <div class='well'>
        <p>COMP.5210-Web Development and Design</p>
      </div>
      <div class='well'>
        <p>Student Name:<br>Illia Huzanau<br>30025407</p>
      </div>
    </div>
  </div>
</div>
<hr style='margin-top:18em;'>

<footer class='site-footer'>
  <div class='container'>
    <div class='row'>
      <div class='col-md-8 col-sm-6 col-xs-12'>
        <p class='copyright-text'>Copyright &copy; 2020 All Rights Reserved
        </p>
      </div>

      <div class='col-md-4 col-sm-6 col-xs-12'>
        <ul class='social-icons'>
          <li><a class='google' href='https://www.google.co.nz/search?ei=P9tKX6_sLpfAz7sPnbSN4Ac&q=scp+foundation&oq=scp+fou&gs_lcp=CgZwc3ktYWIQARgAMgcIABCxAxBDMgQIABBDMgQIABBDMgQIABBDMgIIADICCAAyAggAMgIIADICCAAyAggAOgQIABBHOgoIABCxAxCDARBDOgoILhCxAxCDARBDOgQILhBDUPagCljwpApgya0KaABwAXgAgAGkAYgBggWSAQMwLjSYAQCgAQGqAQdnd3Mtd2l6wAEB&sclient=psy-ab&safe=active&ssui=on'><i class='fa fa-google'></i></a></li>
          <li><a class='pinterest' href='https://www.pinterest.nz/SUNAKO666/scp-foundation/'><i class='fa fa-pinterest'></i></a></li>
          <li><a class='instagram' href='https://www.instagram.com/scpfoundationofficial/?hl=en'><i class='fa fa-instagram'></i></a></li>
          <li><a class='youtube-play' href='https://www.youtube.com/results?search_query=scp+foundation+explained'><i class='fa fa-youtube-play'></i></a></li> 
        </ul>
      </div>
    </div>
  </div>
</footer>
<script src='js/script.js'></script>


    
";
}
?>
</body>
</html>




  