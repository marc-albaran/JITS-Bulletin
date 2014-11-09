<?php
abstract class AbstractDatabase {
	public $database ="JITS";
	public $user ="Marckee";
	public $password = "j0sephine";
}

interface DBInterface{
	public function add($sql);
	public function	edit($sql);
	public function	delete($sql);
	public function	update($sql);
	public function	retrieve($sql);
}

class IBMDB2 extends AbstractDatabase implements DBInterface{
	public $conn;
	function connect(){
		$this->conn=db2_connect($this->database, $this->user, $this->password);
	}
	
	function add($sql){
		db2_exec($this->conn,$sql);
	}
	function edit($sql){
		db2_exec($this->conn,$sql);
	}
	function delete($sql){
		db2_exec($this->conn,$sql);
	}
	function update($sql){
		db2_exec($this->conn,$sql);
	}
	function retrieve($sql){
		return db2_exec($this->conn,$sql);
	}
}
?>