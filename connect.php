<?php

class Connect{

public $conn;

function connectDB(){
	$database ="JITS";
	$user ="Marckee";
	$password = "j0sephine";
	$this->conn=db2_connect($database, $user, $password);
	return $this->conn;
}

function insert_post($post){
	db2_exec($this->connectDB(),"INSERT INTO BULLETIN(POST,CREATED_BY) VALUES('<post>".db2_escape_string($post['title']).db2_escape_string($post['details']).$post['image'].$post['date_posted']."</post>',1)");
}

function get_all_post(){
	$query='select i.id, t.title,t.details,t.date_posted,t.date_modified from bulletin i,xmltable (\'$POST/post\' columns title varchar(100) path \'title\', details varchar(100) path \'details\',date_posted varchar(100) path \'date_posted\',date_modified varchar(100) path \'date_modified\') as t ORDER BY i.ID DESC';
	return db2_exec($this->connectDB(),$query);
}
function get_post($id){
	$query='select i.id, t.title,t.details,t.image,t.date_posted,t.date_modified from bulletin i,xmltable (\'$POST/post\' columns title varchar(100) path \'title\', details varchar(100) path \'details\',image varchar(100) path \'image\',date_posted varchar(100) path \'date_posted\',date_modified varchar(100) path \'date_modified\') as t WHERE i.ID='.$id;
	return db2_exec($this->connectDB(),$query);
}

function remove_post($id){
	db2_exec($this->connectDB(),"DELETE FROM bulletin WHERE ID=".$id);
}
function update_post($id,$xml){
	db2_exec($this->connectDB(),"UPDATE bulletin SET POST='".$xml."' WHERE ID=".$id);
}

function get_user($username,$password){
	$query="SELECT * FROM USER where username='".$username."' and password='".$password."'";
	return db2_exec($this->connectDB(),$query);
}
//end of class
}
?> 
