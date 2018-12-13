<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {   redirect("login.php");   }?>
<?php

$comments = Comment::find_all();

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
                    Comments
                    <!-- <small>Subheading</small> -->
                </h1>
                <p class="bg-success">
                    <?php echo $message; ?>
                </p>
                       
                        <div class="col-md-12">
                            <table class="table table-hover table-responsive">
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
                                                    <a class="delete_button" href="delete_comment.php?id=<?= $comment->id; ?>">Delete</a>
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