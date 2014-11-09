<?php
$search=strtolower($_REQUEST["q"]);

$database ="JITS";
$user ="Marckee";
$password = "j0sephine";
$conn=db2_connect($database, $user, $password);
$query =  db2_exec($conn, "SELECT * FROM BULLETIN");

 while ($row = db2_fetch_object($query)) {
		$id=$row->ID;
$sql = 	"XQUERY for \$d in db2-fn:sqlquery(\"SELECT POST FROM BULLETIN WHERE ID=".$id."\")/post 
			let \$title := \$d/title/text()
			let \$details := \$d/details/text()
			let \$date_posted:=\$d/date_posted/text()
			where 
				\$d/title[contains(lower-case(text()), \"$search\")]/text() or
				\$d/details[contains(lower-case(text()), \"$search\")]/text()
			return 
				<div>
				<strong>{\$title}</strong>
				<p class=\"text-muted\"><small>{\$date_posted}</small></p>
				<hr style=\"margin-top: 0px;margin-bottom: 10px;\"/>
				<p>{\$details}</p></div>
				";
			
$result= db2_exec($conn, $sql);

while($row=db2_fetch_array($result)){
	$query2='select i.id, t.title,t.details,t.image,t.date_posted,t.date_modified from bulletin i,xmltable (\'$POST/post\' columns title varchar(100) path \'title\', details varchar(100) path \'details\',image varchar(100) path \'image\',date_posted varchar(100) path \'date_posted\',date_modified varchar(100) path \'date_modified\') as t WHERE i.ID='.$id;
	$res= db2_exec($conn, $query2);
 	while($date=db2_fetch_object($res)){
	
	echo	"<div class=\"col-md-4\"><div class=\" panel panel-default\">";
	echo	"<div class=\"panel-body\">";
		if(strcmp($date->DATE_POSTED,date("M d,Y"))==0){
			echo "<div class=\"pull-right\"><span class=\"label label-danger\"><strong>NEW</strong></span></div>";
		}
	echo $row[0];
	echo '</div></div></div>';
	}
	}
}
?>