<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {   redirect("login.php");   }?>
<?php 
$message = "";
if (isset($_FILES['file'])) {
    $photo = new photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file']);
    if ($photo->save()) {
        $message = "Photo Uploaded Succesfully";
    }
    else {
        $message = join("<br>", $photo->errors);
    }
}

?>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->

    <?php include("includes/top_nav.php"); ?>

    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

    <?php include("includes/side_nav.php"); ?>

    <!-- /.navbar-collapse -->

</nav>

<div id="page-wrapper">

    <!-- <?php //include("includes/admin_content.php"); ?> -->

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Uploads
                    <!-- <small>Subheading</small> -->
                </h1>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                        <div class="row">
                            <div class="col-md-6">
                                <?php echo $message; ?>
                                <form action="upload.php" method="POST" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="file" name="file" class="">
                                    </div>  
                                    <div class="form-group">
                                        <input type="submit" name="submit" class="btn btn-info">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <form action="upload.php" class="dropzone"></form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php include("includes/footer.php"); ?>