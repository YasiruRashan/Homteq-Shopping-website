<?php
include("db.php");
session_start();
include("detectlogin.php");

$pagename="smart basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

if (isset($_POST['delnb']))   // //if the value of the product id to be deleted (which was posted through the hidden field) is set
{
$delprodId=$_POST['delnb'];//capture the posted product id and assign it to a local variable $delprodid
unset($_SESSION['basket'][$delprodId]);//unset the cell of the session for this posted product id variable
}
echo "1 item removed from the basket<br>";//display a "1 item removed from the basket" message


   
$to =0; 
if (isset($_POST['h_prodid'])) { 

//capture the ID of selected product using the POST method and the $_POST superglobal variable
//and store it in a new local variable called $newprodid
$newprodid=$_POST['h_prodid'];

//capture the required quantity of selected product using the POST method and $_POST superglobal variable
//and store it in a new local variable called $reququantity

$reququantity =$_POST['p_quantity'];



//display the value of the product id, for debugging purposes
//echo "<p> ID of selected product : ".$newprodid;

//Display quantity of selected product, for debugging purposes
//echo"<p>Display quantity of selected product : ".$reququantity;

//create a new cell in the basket session array. Index this cell with the new product id.
//Inside the cell store the required product quantity
$_SESSION['basket'][$newprodid]=$reququantity;
echo "<p>1 item added <br>";

}

else { 
    echo "Current basket unchanged <br>"; 
}

//Create a HTML table with a header to display the content of the shopping basket 
//i.e. the product name,the price, the selected quantity and the subtotal 

echo "<table style='border: solid black 1px'>";; 
echo "<th>Product Name</th>";
echo "<th>Price</th>";
echo "<th>Qunatity</th>";
echo "<th>Subtotal</th>";
echo "<th>Remove Product</th>";
echo "</tr>";


//if the session array $_SESSION['basket'] is set

 if (isset($_SESSION['basket'])) { 
  
//loop through the basket session array for each data item inside the session using a foreach loop
//to split the session array between the index and the content of the cell 
//for each iteration of the loop //store the id in a local variable $index & store the required quantity into a local variable $value
 foreach($_SESSION['basket'] as $index => $value){ 
//SQL query to retrieve from Product table details of selected product for which id matches $index 

//execute query and create array of records $arrayp 
$SQL="select prodId, prodName, prodPrice from Product where prodId= $index";
$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
$arrayp=mysqli_fetch_array($exeSQL); 

echo "<tr>";

echo "<td>".$arrayp['prodName']."</td>";
echo "<td>".$arrayp['prodPrice']."</td>";
// display selected quantity of product retrieved from the cell of session array and now in $value 
echo "<td>".$value."</td>";

 
//calculate subtotal, store it in a local variable $subtotal and display it 
$subtotal=$arrayp['prodPrice'] * $value; //increase total by adding the subtotal to the current total
echo "<td>".$subtotal."</td>";


$to= $to+ $subtotal;

echo "<form action=basket.php method=post>";
echo "<td>";
echo "<input type=submit value='Remove'>";
echo "</td>";
echo "<input type=hidden name=delnb value=".$arrayp['prodId'].">";
echo "</form>";
echo "</tr>";

}

 echo "<tr>";
 echo "<td colspan= '3'>Total</td>";
 echo "<td>".$to."</td>";
 echo "</tr>";
 

}

else {
  echo "Empty basket";
}
/*echo "<tr>";
  echo "<td colspan= '3'>Total</td>";
  echo "<td>".$to."</td>";
  echo "</tr>";*/


echo "</table><br>";
echo"<a href ='clearbasket.php'> Clear Basket</a><br><br>"; // hyper link for the clear basket page

if (isset($_SESSION['userId'])){
  echo "<p>To Finalize your order :<a href='checkout.php'>Check Out</a></p>";
}

else{

echo"<p>New Homteq Customers : <a href='signup.php'>Sign Up</a></p><br>"; // linking signup page for the new members
echo"<p>Returning Homteq Customers : <a href='login.php'>Log In</a></p>"; // linking logIn page for the existing customers
}

include("footfile.html"); //include head layout

echo "</body>";
?>