<?php
session_start();
include("db.php");

$pagename="your login results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include ("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$currentDateTime = date('Y-m-d H:i:s');
$User = $_SESSION ['userId'];

$SQL="INSERT INTO Orders(userId,orderDateTime,orderTotal,orderstatus) 
VALUES ('$User','$currentDateTime',0,'Placed')";

if ($exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn))){
      echo "Hiii";



}









include("footfile.html"); //include head layout
echo "</body>";
?>