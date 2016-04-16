<?php

class DB_Functions {

 private $db;

  function __construct()
  {
   include_once './db_connect.php';
   //connect to database
   $this->db = new DB_Connect();
   $this->db->connect();
   

  }

  // destructor
   function __destruct()
   {
   }

 /*
  * Insert new user
  */

 public function insertUser($greetid,$gcmRegId)
  {
   $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
   //selecting a database
   mysqli_select_db($con,DB_DATABASE);


   // Insert user into database
   $result = mysqli_query($con,"INSERT INTO greetinsta (greetid,gcmregid) VALUES ('$greetid','$gcmRegId') ");
   if($result)
    {
      return true;
    }
     else
    {
      return false;
    }
  }
  
  
  /**
     * Select all user
     * 
     */
     public function getAllUsers() {
	  $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
        // selecting database
        mysqli_select_db($con,DB_DATABASE);
	 
        $result = mysqli_query( $con,"select greetid FROM greetinsta");
        return $result;
		
    }

}