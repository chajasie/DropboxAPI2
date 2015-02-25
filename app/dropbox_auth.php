<?php
	if($user->dropbox_token){
		//get client
	}else{
		$authUrl = $webAuth->start();
		header('Location:' . $authUrl);
		exit();
	}

?>