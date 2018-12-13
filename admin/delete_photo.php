<?php include("includes/init.php"); ?>
<?php if (!$session->is_signed_in()) {   redirect("login.php");   }?>
<?php 

if (empty($_GET['id']))
{
	redirect("../admin/photos.php");
}
$photo = Photo::find_by_id($_GET['id']);
if ($photo) {
	$photo->delete_photo();
	$session->message("The phot {$photo->filename} has been deleted.");
	redirect("../admin/photos.php");
}
else {
	
	redirect("../admin/photos.php");
}

?>
