<?php
session_start();
include ("detectlogin.php");
$pagename="log out"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
echo "Thank You ".$_SESSION['userFName']." ".$_SESSION['userSName']."</p>";
session_unset(); // unsets the session
session_destroy();
echo "You have logged out from the website !! ";
include("footfile.html"); //include head layout
echo "</body>";
?>