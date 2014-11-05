<?php
	$database ="JITS";
	$user ="Marckee";
	$password = "j0sephine";
	$conn=db2_connect($database, $user, $password);

	$image=$_FILES["upload"]["tmp_name"];
	$stmt = db2_prepare($conn, "UPDATE test set image=? where id=1");

	$rc = db2_bind_param($stmt, 1, "image", DB2_PARAM_FILE);
	$rc = db2_execute($stmt);
?>