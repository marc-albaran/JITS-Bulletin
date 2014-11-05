<?php
require_once('connect.php');

class Display_post{


function show_public_post(){

$connect=new connect();
$post=$connect->get_all_post();
	while($row = db2_fetch_object($post)){
		echo '<div class="col-md-4"><div class="panel panel-default"><div class="panel-body">';
		if(strcmp($row->DATE_POSTED,date("M d,Y"))==0){
			echo "<div class=\"pull-right\"><span class=\"label label-danger\"><strong>NEW</strong></span></div>";
		}
		echo '<strong>'.html_entity_decode($row->TITLE).'</strong>';
		echo '<p class="text-muted"><small>Date posted: '.$row->DATE_POSTED.'<br>';
			if($row->DATE_MODIFIED!=''){
				echo 'Date modified: '.$row->DATE_MODIFIED;
			}
		echo '</small></p>';
		echo '<hr style="margin-top: 0px;margin-bottom: 10px;">';
		echo '<p align="left" style="margin-bottom:10px">'.$row->DETAILS.'</p>';
		echo '</div></div></div>';
		}
}

function show_post(){
$connect=new connect();
$post=$connect->get_all_post();
	while($row = db2_fetch_object($post)){
		echo '<div class="panel panel-default"><div class="panel-body"><div class="pull-right">';
		echo $this->options_button($row->ID);
		echo $this->delete_modal($row->ID);
		echo '</div><strong>'.$row->TITLE.'</strong>';
		echo '<p class="text-muted"><small>Date posted: '.$row->DATE_POSTED.'<br>';
			if($row->DATE_MODIFIED!=''){
				echo 'Date modified: '.$row->DATE_MODIFIED;
			}
		echo '</small></p>';
		echo '<hr style="margin-top: 0px;margin-bottom: 10px;">';
		echo '<p align="left" style="margin-bottom:10px">'.$row->DETAILS.'</p>';
		echo '</div></div>';
		}
}


function delete_modal($id){
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
}

function options_button($id){
echo "<form style='padding: 0; margin: 0' method='get' action='edit.php' role='form'>";
echo "<input name='id' value='".$id."' hidden>";
echo "<div class='btn-group btn-group-xs'>";
echo "<button type='submit' class='btn btn-primary btn-xs'><span class='glyphicon glyphicon-edit'></span></button>";
echo '<a href="#'.$id.'" class="btn btn-danger btn-xs" data-toggle="modal"><span class="glyphicon glyphicon-trash"></span></a>';
echo "</div>";
echo "</form>";
}

//end of class
}
?>