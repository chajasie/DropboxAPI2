<?php
	session_start();
	$_SESSION['user_id'] = 1;
	
	require __DIR__ . '/../vendor/autoload.php';
	
	error_reporting(1);
	
	$dropboxKey = 'mgojaoawtt1znwh';
	$dropboxSecret = 'lpqli9hnlpxaoet';
	$appName = "chajasieApp/1.0";
	
	$appInfo = new Dropbox\AppInfo($dropboxKey, $dropboxSecret);
	
	//Store SCRF token
	$csrfTokenStore = new Dropbox\ArrayEntryStore($_SESSION, 'dropbox-auth-csrf-token');
	
	//Define auth details
	$webAuth = new Dropbox\WebAuth($appInfo, $appName, 'http://localhost:82/dropboxAPI/dropbox_finish.php', $csrfTokenStore);
	
	$db = new PDO('mysql:host=localhost;dbname=dropboxapi', 'roni' ,'Standard15');
	
	//user details
	$user = $db->prepare("Select * from user where uid = :user_id");
	$user->execute(['user_id' => $_SESSION['user_id']]);
	$user = $user->fetchObject();

?>