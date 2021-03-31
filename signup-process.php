<?php
session_start(); 
include("db.php");
$pagename="sign up results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page


$firstName=$_POST['fname'];
$lastName=$_POST['lname'];
$address=$_POST['address'];
$postcode =$_POST['postcode'];
$telNo =$_POST['telno'];
$email =$_POST['email'];
$password =$_POST['pwd'];
$checkedPassword =$_POST['conpwd'];


if (!empty($firstName) && !empty($lastName) && !empty($address) && !empty($postcode) && !empty($telNo) && !empty($email) && !empty($password) )
{   // if the mandatory fields in the form (all fields) are not empty



    if ($password != $checkedPassword){ ////if the 2 entered passwords do not match
    echo "The passwords are not matching";
    echo "<p>Go back to : <a href='signup.php'>Sign Up</a> </p>";
    }

    else{

       // reguar expression to check whether the email follows the right format.
        $regex = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/"; 
        

        if(preg_match($regex,$email)) {  //if email matches the regular expression using preg_match function.

               $SQL="INSERT INTO users (userType,userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword) 
               VALUES ('','$firstName','$lastName','$address','$postcode','$telNo','$email','$password')";

                 //run SQL query for connected DB or exit and display error message
                 $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
                          
        }
        else{

            echo "Email not in the right format<br>";
            echo "<p>Go back to : <a href='signup.php'>Sign Up</a> </p>";

        }
    }

  
} 
else{
    echo " Error : all mandatory fields need to be filled in !!!  </br>";
    echo "<p>Go back to : <a href='signup.php'>Sign Up</a> </p>";
}

include("footfile.html"); //include head layout
echo "</body>";
?>