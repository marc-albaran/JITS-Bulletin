<?php
clearstatcache();

include 'get_post.php';
include 'display_post.php';

$display_post=new display_post();

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
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
	<div class="row">
	<div class="col-md-4"></div>
    <div class="col-md-4" align="center">
	<form class="navbar-form " role="search">
		   <input type="text" class="form-control" type="text" onkeyup="showResults(this.value)" placeholder="Search" id="inputSuccess5">
	</form>
	</div>
	<div class="col-md-3" align="right">
	<ul class="nav navbar-nav navbar-right">
        <li><a href="index.php">Logout</a></li>

      </ul>
	</div>
	<div class="col-md-1"></div>
	</div>
 </div>
</nav>

<div class="container" style="background-color:#E7E7E8;">
<br><br><br>
<div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6" id="prompt" align="center">
		<?php 
			isset($_GET['insert'])?$insert=$_GET['insert']:NULL;
			if($insert=="true"){
				echo '<div class="alert alert-success" role="alert">'.$_GET['prompt'].'</div>';
			}
			isset($_GET['delete'])?$delete=$_GET['delete']:NULL;
			if($delete=="true"){
				echo '<div class="alert alert-success" role="alert">'.$_GET['prompt'].'</div>';
			}
		?>
	</div>
	<div class="col-md-3"></div>
</div>	
<div class="row">
	<div class="col-md-1"></div>
	
	<div class="col-md-4 panel panel-default" id="createpost" >
		<div class="panel-body">
			<div align="center">
			</div>
			<form role="form" method="post" action="get_post.php" enctype="multipart/form-data">
			  <div class="form-group">
				<br>	
				<label for="title">Title</label>
				<input type="text" class="form-control" name="title" id="title" value="<?php if($insert=="false"){ echo trim($_GET['title']);}?>">
			  </div>
			  <div class="form-group">
				<label for="details">Details</label>
				<textarea class="form-control" name="details" id="details" rows="3"><?php if($insert=="false"){echo trim($_GET['details']);}?></textarea>
			  </div>
			  <button type="submit" id="post" class="btn btn-primary" disabled>Post</button>
			</form>
		</div>
	</div>
	<div class="col-md-6" id="results">
		<?php $display_post->show_post();?>
	</div>
	
	<div class="col-md-1"></div>
</div>
</div>
<script src="assets/js/disablebutton.js"></script>
<script src="assets/js/hide.js"></script>
<script src="livesearch2.js"></script>
</body>  
</html>