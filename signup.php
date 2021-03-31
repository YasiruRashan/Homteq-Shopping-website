<?php
$pagename="sign up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


echo "<form action =signup-process.php method=post>";

echo "<table style='border: 0px' ; align ='center'>";

echo "<tr>";

echo "<td style='border: 0px'><label for='fname'>First name </label></td>";   // First Name
echo "<td style='border: 0px'><input type='text' name='fname'></td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'><label for='lname'>Last name </label></td>";   // Last  Name
echo "<td style='border: 0px'><input type='text' name='lname'></td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'><label for='address'>Address </label></td>";   // Address
echo "<td style='border: 0px'><input type='text' name='address'></td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'><label for='postcode'>Postcode </label></td>";   // PostCode
echo "<td style='border: 0px'><input type='text' name='postcode'></td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'><label for='telno'>Tel No </label></td>";   // Telno
echo "<td style='border: 0px'><input type='text' name='telno'></td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'><label for='email'>Email Address </label></td>";   // Email
echo "<td style='border: 0px'><input type='text' name='email'></td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'><label for='pwd'>Password </label></td>";   // Password
echo "<td style='border: 0px'><input type='text' name='pwd'></td>";
echo "</tr>";

echo "<tr>";
echo "<td style='border: 0px'><label for='conpwd'>Confirm Password </label></td>";   // Confirmed Password
echo "<td style='border: 0px'><input type='text' name='conpwd'></td>";
echo "</tr>";

echo"<tr>";
echo "<td style='border: 0px'><input type=submit name='submitbtn' value='Submit' id='submitbtn'></td>";
echo "</tr>";


echo "</table>";

include("footfile.html"); //include head layout
echo "</body>";
?>