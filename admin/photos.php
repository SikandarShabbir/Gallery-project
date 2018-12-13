<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {   redirect("login.php");   }?>
<?php

$photos = Photo::find_all();

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
                    Photos
                    <!-- <small>Subheading</small> -->
                </h1>
                <p class="bg-success">
                    <?php echo $message; ?>
                </p>
                        <!-- <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol> -->
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered table-responsive">
                                <caption>All Photos</caption>
                                <thead>
                                    <tr>
                                        <th>Photo</th>
                                        <th>ID</th>
                                        <th>File Name</th>
                                        <th>Title</th>
                                        <th>Size</th>
                                        <th>Comments</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($photos as $photo): ?>
                                        <tr>
                                            <td><img class="img-responsive" src="<?= $photo->picture_path()? $photo->picture_path():'https://via.placeholder.com/150x150' ?>" width="200" alt="">
                                                <div class="action_link">
                                                    <a class="delete_button" href="delete_photo.php?id=<?= $photo->id; ?>">Delete</a>
                                                    <a href="edit_photo.php?id=<?= $photo->id; ?>">Edit</a>
                                                    <a href="../photo.php?id=<?= $photo->id; ?>">View</a>
                                                </div></td>
                                                <td><?= $photo->id ?></td>
                                                <td><?= $photo->filename ?></td>
                                                <td><?= $photo->title ?></td>
                                                <td><?= $photo->size ?></td>
                                                <td><a href="comment_photo.php?id=<?= $photo->id; ?>"><?php
                                                $comments = Comment::find_the_comments($photo->id);
                                                echo count($comments);
                                                ?></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- /#page-wrapper -->

            <?php include("includes/footer.php"); ?>