<?php

if (isset($_SESSION['userId'])){
   echo "<p id = userdetails>".$_SESSION['userFName']." ".$_SESSION['userSName']."</p>";
}

?>