<?php
require_once('connect.php'); 

class Edit_post{

public $id="";

function __construct(){
	$this->id=isset($_GET['id'])?$_GET['id']:NULL;
}

function display_post(){
	$connection= new connect();
	$post=$connection->get_post($this->id);
	
	while($row=db2_fetch_object($post)){
		echo			'<form role="form" method="post" action="update_post.php">';
		echo			  '<div class="form-group"><br>';	
		echo				'<label for="title">Title</label>';
		echo				'<input type="text" class="form-control" name="title" id="title" value="'.$row->TITLE.'">';
		echo			  '</div>';
		echo			  '<div class="form-group">';
		echo				'<label for="details">Details</label>';
		echo				'<textarea class="form-control" name="details" id="details" rows="3">'.$row->DETAILS.'</textarea>';
		echo			  '</div>';
		echo			  '<div class="form-group">';
		echo				'<input type="text" name="date_posted" value="'.$row->DATE_POSTED.'" hidden>';
		echo				'<input type="text" name="id" value="'.$row->ID.'" hidden>';	
		echo			  '</div>';
		echo 			'<div class="btn-group">';
		echo			  '<button type="submit" id="post" class="btn btn-primary" disabled>Update</button>';		
		echo			  '<a href="home.php" class="btn btn-danger">Cancel</a>';
		echo			'</div>';
		echo			'</form>';
	}
}

//end of class
}

?>