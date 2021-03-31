<?php
session_start();
include("db.php");

$pagename="your login results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

$email = $_POST['email'];
$password = $_POST['Password'];

//echo "Email Entered : ".$email."<br>";
//echo "Password Entered : ".$password."<br>";

if (empty($email) || empty($password)) {//
    echo "<b>LOGIN FAILED !!</b><br>";
    echo "*Both email and password fields need to be filled<br>";
    echo "*Make sure you provided all the required details<br>";
    echo "<p>Go Back to <a href='login.php'>Log In</a></p>";
}

else{
    $SQL="select * from Users where userEmail = '".$email."'";
    $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
    $arrayU=mysqli_fetch_array($exeSQL);
     
    
    $nberecs =mysqli_num_rows($exeSQL);

    if ($nberecs == 0){
        echo "<b>LOGIN FAILED !!</b><br>";
        echo "Email not recognised, login again";
        echo "<p>Go Back to <a href='login.php'>Log In</a></p>";
    }
    else

    {if ($arrayU['userPassword'] != $password){
        echo "<b>LOGIN FAILED !!</b><br>";
        echo "Password not recognised, login again";
        echo "<p>Go Back to <a href='login.php'>Log In</a></p>";

    }

    else
    {
        echo "Login is succesful<br>";
        $_SESSION['userId'] =$arrayU['userId'];
        $_SESSION['userType'] =$arrayU['userType'];
        $_SESSION['userFName'] =$arrayU['userFName'];
        $_SESSION['userSName'] =$arrayU['userSName'];

        echo "welcome ".$_SESSION['userFName']." ".$_SESSION['userSName']." !!";

    }

        
        
    }


   

}




include("footfile.html"); //include head layout
echo "</body>";
?>