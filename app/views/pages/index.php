<?php 	

	//this is the main page with all the variables
	
	//echo SITENAME;
	//echo $data['title'];
	//var_dump($data);
	foreach ($data['users'] as $key => $user) {
		//echoing variable from database 'users'
		echo "users info: " . $user->user_name . ", email: " . $user->user_email . "...";
		echo "<br>";

	}

?>