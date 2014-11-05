<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
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
	<div class="col-md-4">
		<a class="navbar-brand" href="#login"><strong>JITS Information Center</strong></a>
	</div>
    <div class="col-md-4" align="center">
	<form class="navbar-form " role="search">
		   <input type="text" class="form-control" type="text" onkeyup="showResults(this.value)" placeholder="Search" id="inputSuccess5">
	</form>
	</div>
	<div class="col-md-4"></div>
	</div>
 </div>
</nav>
<div class="container" style="background-color:#E7E7E8;" id="viewposts">
	<br><br><br>
	<div class="row" id="results">
	<!--post here-->
		<div class="row" id="post">
		</div>
	</div>
</div>

<div class="container-full" id="login">
<br><br><br><br><br>
<div class="container">
	<div class="row" align="center">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<img src="assets/images/logo.png" style="margin-top: 20px;margin-bottom: 5px;" class="img-responsive">
			</div>
			<div class="col-md-3"></div>	
		</div>
		<div class="col-md-3"></div>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" align="center">
			<font face="OptimusPrinceps" color="white" size="6px">Information Center</font>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row" align="center" id="prompt">
		<div class="col-md-4"></div>
		<div class="col-md-4" align="center">
		<?php 
			isset($_GET['prompt'])?$prompt=$_GET['prompt']:NULL;
			if($prompt){
				echo '<div align="center" class="alert alert-danger" role="alert">'.$_GET['prompt'].'</div>';
				echo '<script>window.scrollTo(0,document.body.scrollHeight);</script>';
			}
		?>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4" align="right">
		<!--login here-->
		<form class="form-horizontal" action="login.php" method="post" role="form">
		 	  <input type="text" style="margin-top: 5px;margin-bottom: 5px;" class="form-control input-sm" id="username" name="username" placeholder="Username" value="<?php echo trim($_GET['username']) ?>">	
		 	  <input type="password" style="margin-top: 5px;margin-bottom: 5px;" class="form-control input-sm" id="password" name="password" placeholder="Password">
			  <button type="submit" style="margin-top: 5px;margin-bottom: 5px;" class="btn btn-warning btn-block btn-small" id="login" >Login</button>
		</form>
		</div>
		<div class="col-md-4"></div>
	</div><br><br><br>
	<footer>
		<div class="row">
			<div class="col-md-6"></div>
			<div class="col-md-6" align="right">
				<a href="#viewposts" class="help-block"><font color="white"><strong><span class="glyphicon glyphicon-eye-open"></span> view posts</strong></font></a>
			</div>
		</div>
		<hr style="margin-bottom: 5px;margin-top: 5px;">
		<div class="row">
			<div class="col-md-6">
				<font color="white">
				<address>
				  <small><strong>Albaran,</strong>Marc Joseph C.</small>
				</address>
				</font>
			</div>
			<div class="col-md-6" align="right">
				<font color="white"><small>IT 186 Modern Query Languages</small></font>
			</div>
		</div>
		
	</footer>
</div>
</div>
<script src="livesearch.js"></script>
<script>
setInterval(function () {$('#post').load('test.php')}, 1000);

</script>
<script>
$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});
</script>
<script>
window.location.hash="no-back-button";
window.location.hash="Again-No-back-button";//again because google chrome don't insert first hash into history
window.onhashchange=function(){window.location.hash="no-back-button";}
</script>
<script src="assets/js/hide.js"></script>
<script src="assets/js/disablebutton2.js"></script>

</body>  
</html>