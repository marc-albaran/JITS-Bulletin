<?php
require_once('connect.php'); 

class Update_post{
public $id="";
public $title="";
public $details="";
public $date_posted="";

function __construct(){
	  $this->id=isset($_POST['id'])?$_POST['id']:NULL;
      $this->title=isset($_POST['title'])?$_POST['title']:NULL;
	  $this->details=isset($_POST['details'])?$_POST['details']:NULL;
	  $this->date_posted=isset($_POST['date_posted'])?$_POST['date_posted']:NULL;
  }
function freent(){
echo $this->id;
echo $this->title;
echo $this->details;
echo $this->date_posted;

}
function format_xml(){
$title=$this->title;
$details=$this->details;
$date_posted=$this->date_posted;

return "<post><title>".db2_escape_string($title)."</title><details>".db2_escape_string($details)."</details><date_posted>".$date_posted."</date_posted><date_modified>".date("M d,Y")."</date_modified></post>";
}

function update_xml_column(){
	$connection=new connect();
	$connection->update_post($this->id,$this->format_xml());
}

}
$update= new update_post();
$update->update_xml_column();
echo "<script>window.location = 'http://localhost/bulletin/home.php?insert=true&prompt=Your+post+has+been+edited%2E';</script>";		
	
?>