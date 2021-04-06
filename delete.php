<?php
$id= $_GET['id'];
$db = mysqli_connect("localhost", "root", "", "photos"); 
$q=" DELETE FROM `image` WHERE id=$id ";
mysqli_query($db,$q);
header('location:display.php');
?>