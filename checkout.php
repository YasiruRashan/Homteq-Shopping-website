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

$to = 0;
$currentDateTime = date('Y-m-d H:i:s');
$User = $_SESSION ['userId'];

$SQL="INSERT INTO Orders(userId,orderDateTime,orderTotal,orderstatus) 
VALUES ('$User','$currentDateTime',0,'Placed')";
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));

if (mysqli_errno($conn)==0)
{
$SQL2="select max(orderNo) as maxno from orders where userId=".$_SESSION['userId'];
$exeSQL2=mysqli_query($conn,$SQL2) or die(mysqli_error($conn));
$arrayord=mysqli_fetch_array($exeSQL2);
$latestOrderNo =$arrayord['maxno'];
echo "<p>Your order has been placed successfully.</p> <br>";
echo "<b><p>ORDER NO: ".$latestOrderNo."</b></p><br>";

echo "<table border=1 cellpadding=5>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Price</th>";
echo "<th>Quantity</th>";
echo "<th>Subtotal</th>";
echo "</tr>";


foreach($_SESSION['basket'] as $index => $value){ 
      //SQL query to retrieve from Product table details of selected product for which id matches $index      
      //execute query and create array of records $arrayp 
      $SQL="select prodId, prodName, prodPrice from Product where prodId= $index";
      $exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
      $arrayb=mysqli_fetch_array($exeSQL); 
      $subtotal=$value * $arrayb['prodPrice'];

      
      $SQL4="insert into order_line (orderNo, prodId, quantityOrdered, subToatal) values (".$latestOrderNo.",".$index.",".$value.",".$subtotal.")";
      $exeSQL4=mysqli_query($conn, $SQL4) or die (mysqli_error($conn));
 
      echo "<tr>";
      echo "<td>".$arrayb['prodName']."</td>";
      echo "<td>".$arrayb['prodPrice']."</td>";
        // display selected quantity of product retrieved from the cell of session array and now in $value 
      echo "<td>".$value."</td>";
     //calculate subtotal, store it in a local variable $subtotal and display it 
     $subtotal=$arrayb['prodPrice'] * $value; //increase total by adding the subtotal to the current total
     echo "<td>".$subtotal."</td>";
     $to= $to+ $subtotal;
     echo "</tr>";

   }   
   echo "<tr>";
   echo "<td colspan= '3'>Total</td>";
   echo "<td>".$to."</td>";
   echo "</tr>";
   echo "</table>";
   
   $SQL5="UPDATE Orders SET orderTotal=".$to." WHERE orderNo=".$latestOrderNo;
  $exeSQL5 = mysqli_query($conn, $SQL5) or die (mysqli_error($conn));
  echo "<br>To leave the system <a href=logout.php>Logout</a>";

}
else
{
echo "<p>Sorry there has been an error with your order";
echo "Go back to <a href=basket.php>My Basket</a>";
}

include("footfile.html"); //include head layout
echo "</body>";
?>