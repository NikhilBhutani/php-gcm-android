<?php
 
  require_once 'config.php';
  
  
$greetid = $_POST["greetid"];
  
  $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
   //selecting a database
   mysqli_select_db($con,DB_DATABASE);

   
$os = mysqli_query( $con,"select * FROM greetinsta");
$userCount = count($os);


while($comp = mysqli_fetch_array($os)) {
 
  if($greetid==$comp['greetid']) 
   
   {
    echo "1";
	break;
   }
  /* else
   {
    echo "Neah";
	continue;
   }
 */   
}

?>