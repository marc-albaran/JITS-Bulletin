<?php
require_once('connect.php');

class Login{

public $username="";
public $password="";

function __construct(){
	$this->username=isset($_POST['username'])?$_POST['username']:NULL;
	$this->password=isset($_POST['password'])?$_POST['password']:NULL;
}

function validate(){
	$connect=new connect();
	$username_and_password=$connect->get_user($this->username,$this->password);
	
	if(db2_fetch_row($username_and_password)){
		return true;
	}else{
		return false;
	}
}

function is_null(){
if($this->username==NULL && $this->password==NULL){
	return true;
}else{
	return false;
}
}

}

$login=new login();
	if($login->validate()){
		echo "<script>window.location = 'http://localhost/bulletin/home.php';</script>";
	}else if($login->is_null()){
		echo "<script>window.location = 'http://localhost/bulletin/index.php';</script>";
	}else{
		echo "<script>window.location = 'http://localhost/bulletin/index.php?username=".$login->username."&prompt=Invalid+username+and+or+password';</script>";
	}
?>