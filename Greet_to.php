<?php
	//Generic php function to send GCM push notification
   function sendPushNotificationToGCM($registation_ids, $message,$s_name) {
		//Google cloud messaging GCM-API url
        $url = 'https://android.googleapis.com/gcm/send';
		//echo $registation_ids;
        $fields = array(
            'registration_ids' => array($registation_ids),
            'data' => array( "m" => $message,"n"=>$s_name)
			
        );
		// Update your Google Cloud Messaging API Key
		if (!defined('GOOGLE_API_KEY')) {
			define("GOOGLE_API_KEY", "FOLKS, ENTER YOUR API KEY HERE AND HAVE FUN!"); 		
		}
        $headers = array(
            'Authorization: key=' . GOOGLE_API_KEY,
            'Content-Type: application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);	
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);				
        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }
        curl_close($ch);
		echo $result;
        return $result;
		
    }
?>

<?php
 
 require_once 'config.php';

 $greet_name = $_POST["GreetName"];
 $greet_to = $_POST["Greet_to"];
 $senders_name = $_POST["Sender_name"];
 
 
     
	  $con = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
        // selecting database
        mysqli_select_db($con,DB_DATABASE);
	 
        $result = mysqli_query( $con,"select gcmregid FROM greetinsta where greetid = '$greet_to' ");
		 while ($row = $result->fetch_assoc()) {
		 
		$registation_ids = $row['gcmregid'];
		 }
	//	$message = array('message'=>$greet_name,'senders_name'=>$senders_name);
	//	$message = $greet_name;
	$message = $greet_name;
	$s_name = $senders_name; 
		sendPushNotificationToGCM($registation_ids, $message,$s_name); 
    
    

?>
