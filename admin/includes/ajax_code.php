<?php 
require("init.php");
$user = new User();
if (isset($_POST['img_name'])) {

	$user->ajax_save_user_image($_POST['img_name'],$_POST['user_id']);

}
if (isset($_POST['photo_id'])) {

	// $photo = new Photo();
	Photo::display_sidebar_data($_POST['photo_id']);

}



 ?>