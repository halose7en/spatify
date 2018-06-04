<?php 
	ob_start();
	//This turns on output buffering (when a php page loads, it sends data to the server in pieces, this just means wait until all the data has been recieved before sending it to the server)

	$timezone = date_default_timezone_set("America/New_York");

	$con = mysqli_connect("localhost", "root", "", "spatify");
//	 ("Server", "defauld userName", "password, "database Name")

	if(mysqli_connect_errno()) {
		echo "fail to connect" . mysqli_connect_errno();
					// Dots apend strings together
	}


?>