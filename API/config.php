<?php
	
	// Turn off error reporting
    error_reporting(0);
    
    
	//firebase database link
	$firebaes_Databaes_URL = "firebaseURL";
	$firebaseDb_URL=$firebaes_Databaes_URL."Match";
	$firebaseDb_URL_MainDb=$firebaes_Databaes_URL;
	
	//https://i.gyazo.com/f1e5ba9f40c39abfdec1a01325c59cbd.png 
	//you can get server key from here for enable push notificaton 
	$firebaes_firebase_key = "firebase_key";
	
	define("firebaes_firebase_key",$firebaes_firebase_key);
	
	//database configration
	$servername = "server_name";
	$database = "database_name";
	$username = "database_username";
	$password = "database_password";
    
	// Create connection

	$conn = mysqli_connect($servername, $username, $password, $database);
	mysqli_query($conn,"SET SESSION sql_mode = 'NO_ENGINE_SUBSTITUTION'");

	// Check connection

	
	function sendPushNotificationToMobileDevice($data)
    {
    	$key=firebaes_firebase_key;
      
    	$curl = curl_init();
    	
    	curl_setopt_array($curl, array(
    		CURLOPT_URL => "https://fcm.googleapis.com/fcm/send",
    		CURLOPT_RETURNTRANSFER => true,
    		CURLOPT_ENCODING => "",
    		CURLOPT_MAXREDIRS => 10,
    		CURLOPT_TIMEOUT => 30,
    		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    		CURLOPT_CUSTOMREQUEST => "POST",
    		CURLOPT_POSTFIELDS => $data,
    		CURLOPT_HTTPHEADER => array(
    			"authorization: key=".$key."",
    			"cache-control: no-cache",
    			"content-type: application/json",
    			"postman-token: 85f96364-bf24-d01e-3805-bccf838ef837"
    		),
    	));
    
    	$response = curl_exec($curl);
    	$err = curl_error($curl);
    
    	curl_close($curl);
    
    	if ($err) 
    	{
    	   print_r($err);
    	} 
    	else 
    	{
    		print_r($response);
    	}
    
    }
    
    
    function curlsingle_request($data, $baseurl)
    {
        $headers = array(
            "Accept: application/json",
            "Content-Type: application/json"
        );
        
        $baseurl=$baseurl."installer/.json";
        
        $ch = curl_init($baseurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $return = curl_exec($ch);
        $json_data = json_decode($return, true);
        curl_close($ch);
        return $json_data;
    }
    
	
?>