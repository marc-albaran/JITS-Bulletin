<?php
require_once('connect.php'); 

class Get_post{

public $title="";
public $details="";
public $success="";

function __construct(){
      $this->title=isset($_POST['title'])?$_POST['title']:NULL;
	  $this->details=isset($_POST['details'])?$_POST['details']:NULL;
	  $this->success=false;
  }

function post_not_null(){
	if($this->title!=NULL && $this->details!=NULL){
		return true;
	}else{
		return false;
	}
}
function insert_post(){
	$connection=new connect();
	if($this->post_not_null()){
		$connection->insert_post($this->format_post());
		$this->success=true;
	}
}

function format_post(){
	$title=$this->title;
	$details=$this->details;

	return array('title'=>'<title>'.$title.'</title>','details'=>'<details>'.$details.'</details>','image'=>'<image>'.$image.'</image>','date_posted'=>'<date_posted>'.date("M d,Y").'</date_posted>');
		
}

function there_is_success(){
	return $this->success;
}


 
//end of class 
}

$post = new get_post();
$post->insert_post();
	
	if($post->there_is_success()){
		echo "<script>window.location = 'http://localhost/bulletin/home.php?insert=true&prompt=Your+announcement+has+been+posted%2E';</script>";		
	}
?>