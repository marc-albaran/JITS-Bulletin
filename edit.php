<?php
clearstatcache();

include 'edit_post.php';

?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="viewport" content="wnameth=device-wnameth, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta HTTP-EQUIV="Pragma" content="no-cache">
<meta HTTP-EQUIV="Expires" content="-1" >
<!--<link href="assets/css/bootstrap.css" rel="stylesheet">-->
<link href="assets/css/bootstrap-yeti.css" rel="stylesheet">
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>  
   
<title>JITS Information Center</title>
</head>
<html lang="en">
<body style="background-color:#e9eaed;">
<div class="container">
<br><br><br>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4 panel panel-default">
			<div class="panel-body">
		<?php 
			$edit=new edit_post();
			$edit->display_post();
		?>
			</div>
		</div>
		<div class="col-md-4"></div>
	</div>

<script src="assets/js/disablebutton.js"></script>
<script src="assets/js/hide.js"></script>
</body>  
</html>