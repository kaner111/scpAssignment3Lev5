<?php
$user = "a3002540_scpuser";
$pw = "Toiohomai1234";
$db = "a3002540_scp";

//database connection objects (address, user, pw, db)
$connection = new mysqli('localhost', $user, $pw , $db) or die(mysqli_error($connection));

//create cariable that stores all records from our database
$record = $connection->query("select * from pages") or die($connection->error());

if(isset($_POST['submit']))
{
$pg = $_POST['pg'];

$title = mysqli_real_escape_string ($connection, $_POST['title']);
$class = mysqli_real_escape_string ($connection, $_POST['class']);
$containment = mysqli_real_escape_string ($connection, $_POST['containment']);
$description = mysqli_real_escape_string ($connection, $_POST['description']);
$image = mysqli_real_escape_string ($connection, $_POST['image']);

$h1 = mysqli_real_escape_string ($connection, $_POST['h1']);
$p1 = mysqli_real_escape_string ($connection, $_POST['p1']);

$h2 = mysqli_real_escape_string ($connection, $_POST['h2']);
$p2 = mysqli_real_escape_string ($connection, $_POST['p2']);

$h3 = mysqli_real_escape_string ($connection, $_POST['h3']);
$p3 = mysqli_real_escape_string ($connection, $_POST['p3']);

$p4 = mysqli_real_escape_string ($connection, $_POST['h4']);
$p4 = mysqli_real_escape_string ($connection, $_POST['p4']);

$sql = "insert into pages(pg, title, class, containment, description, image, h1, p1, h2, p2, h3, p3, h4, p4) values('$pg','$title','$class','$containment','$description','$image','$h1','$p1','$h2','$p2','$h3','$p3','$h4','$p4')";

if($connection->query($sql) === TRUE)
{
    echo "
    
    <h1 style='font-family:Courier;'>Record successfully added</h1> 
    <p><a href='index.php'> Back Home </p>
    
    
    ";
}
else
{
    echo "
    <h1 style='font-family:Courier;'>Record failed to add</h1>
    <p><a href='index.php'> Back Home </p>
    
    ";
}
}


//update content
if(isset($_POST['update']))
{

$id = mysqli_real_escape_string ($connection, $_POST['id']);
$pg = mysqli_real_escape_string ($connection, $_POST['pg']);
$title = mysqli_real_escape_string ($connection, $_POST['title']);
$class = mysqli_real_escape_string ($connection, $_POST['class']);
$image = mysqli_real_escape_string ($connection, $_POST['image']);
$containment = mysqli_real_escape_string ($connection, $_POST['containment']);
$description = mysqli_real_escape_string ($connection, $_POST['description']);

$h1 = mysqli_real_escape_string ($connection, $_POST['h1']);
$p1 = mysqli_real_escape_string ($connection, $_POST['p1']);

$h2 = mysqli_real_escape_string ($connection, $_POST['h2']);
$p2 = mysqli_real_escape_string ($connection, $_POST['p2']);

$h3 = mysqli_real_escape_string ($connection, $_POST['h3']);
$p3 = mysqli_real_escape_string ($connection, $_POST['p3']);

$p4 = mysqli_real_escape_string ($connection, $_POST['h4']);
$p4 = mysqli_real_escape_string ($connection, $_POST['p4']);

$update = "update pages set pg='$pg',title='$title',class='$class',containment='$containment',description='$description',image='$image',h1='$h1',p1='$p1',h2='$h2',p2='$p2',h3='$h3',p3='$p3',h4='$h4',p4='$p4' where id='$id'";

if($connection->query($update) === TRUE)
{
    echo "
    <h1 style='font-family:Courier;'>Record successfully updated</h1>
    <p><a href='index.php'> Back Home </p>
    ";
}
else
{
    echo "
    <h1 style='font-family:Courier;'>Record failed to update</h1>
    <p><a href='index.php'> Back Home </p>
    ";
}
}

if(isset($_GET['delete']))
{
    $id = $_GET['delete'];
    
    $delete = "delete from pages where id=$id";
    
    if($connection->query($delete) === TRUE)
{
    echo "
    <h1 style='font-family:Courier;'>Record successfully deleted</h1>
    <p><a href='index.php'> Back Home </p>
    ";
}
else
{
    echo "
    <h1 style='font-family:Courier;'>Record failed to delete</h1>
    <p><a href='index.php'> Back Home </p>
    ";
}
}


?>