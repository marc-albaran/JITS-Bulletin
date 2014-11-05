<?php
require_once('connect.php');

class Delete_post{
public $id="";
public $success=false;

function __construct(){
    $this->id=isset($_POST['id'])?$_POST['id']:NULL;
}
function is_delete_successful(){
	return $this->success;
}

function remove_post(){
	$connect=new connect();
	$connect->remove_post($this->id);
	$this->success=true;
}
//end of class
}
$del=new delete_post();
$del->remove_post();
echo "<script>window.location = 'http://localhost/bulletin/home.php?delete=true&prompt=Post+has+been+removed.';</script>";
?>
?>