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
 	echo	"<div class=\"panel panel-default\">";
	echo	"<div class=\"panel-body\">";
	echo	"<div class=\"pull-right\">";
	echo "<form style='padding: 0; margin: 0' method='get' action='edit.php' role='form'>";
	echo "<input name='id' value='".$id."' hidden>";
	echo "<div class='btn-group btn-group-xs'>";
	echo "<button type='submit' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-edit'></span></button>";
	echo '<a href="#'.$id.'" class="btn btn-danger btn-xs" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>';
	echo "</div>";
	echo "</form></div>";
				
	echo $row[0];
	echo '<div id="'.$id.'" class="modal fade">';
	echo        '<div class="modal-sm">';
	echo            '<div class="modal-content">';
	echo                '<div class="modal-header">';
	echo                    '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>';
	echo                    '<h4 class="modal-title">Delete Post</h4>';
	echo                '</div>';
	echo                '<div class="modal-body" align="center">';
	echo                    '<p>Are you sure you want to delete this post?</p>';
	echo                '</div>';
	echo                '<div class="modal-footer">';
	echo 					"<form method='post' action='delete_post.php'>";
	echo 					"<input name='id' value='".$id."' hidden>";
	echo                    '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>';
	echo                    '<button type="submit" class="btn btn-primary">Delete</button>';
	echo 					"</form>";
	echo                '</div>';
	echo            '</div>';
	echo        '</div>';
	echo    '</div>';
	echo "</div></div>";
	}
}
?>