<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {   redirect("login.php");   }?>
<?php
    if (empty($_GET['id'])) {
        redirect('photos.php');
    }
$comments = Comment::find_the_comments($_GET['id']);

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
                    comments
                    <!-- <small>Subheading</small> -->
                </h1>
                       
                        <div class="col-md-12">
                            <table class="table table-hover table-bordered table-responsive">
                                <!-- <caption>All comments</caption> -->
                                <!-- <a href="add_comment.php" class="btn btn-primary">Add comment</a> -->
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                        <!-- <th>First Name</th>
                                        <th>Last Name</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($comments as $comment): ?>
                                        <tr>
                                            <td><?= $comment->id; ?> </td>
                                                                                      
                                                <td><?= $comment->author; ?>
                                                <div class="action_link">
                                                    <a href="delete_comment_photo.php?id=<?= $comment->id; ?>">Delete</a>
                                                    <!-- <a href="#">View</a> -->
                                                </div></td>
                                                <td><?= $comment->body; ?></td>
                                                <!-- <td><?= $comment->last_name ?></td> -->
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