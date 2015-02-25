<?php
	require 'app/start.php';
	
	
	list($accessToken) = $webAuth->finish($_GET);
	$store = $db->prepare("
		UPDATE user
		set dropbox_token = :dropbox_token
		WHERE uid = :user_id
	");
	
	$store->execute([
		'dropbox_token' => $accessToken,
		'user_id' => $_SESSION['user_id']
	]);
	
	header('Location: index.php');
?>