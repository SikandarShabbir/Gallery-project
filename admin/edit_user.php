<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {   redirect("login.php");   }?>
<?php

if (empty($_GET['id'])) {
    redirect("users.php");
}
else
{
    $user =User::find_by_id($_GET['id']);
    if (isset($_POST['update'])) {
        if ($user) {
           $user->username = $_POST['username'];
           $user->first_name = $_POST['first_name'];
           $user->last_name = $_POST['last_name'];
           $user->password = $_POST['password'];
           if (empty($_FILES['file'])) {
               $user->save();
               $session->message("The User has been Updated!");
               redirect("users.php");
           }else{
               $user->set_file($_FILES['file']);
               $user->save_user_image();
               $user->save();
               // redirect("edit_user.php?id={$user->id}");
               $session->message("The User has been Updated!");
               redirect("users.php");
           }
       }
   }
}
?>

<?php include("includes/photo_library_modal.php"); ?>

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
                    Users
                    <small>Subheading</small>
                    <!-- <h2><?php //var_dump( $user->image_path_and_placeholder()); exit; ?></h2> -->
                </h1>
                <div class="col-md-6 user_image_box">
                   <a href="#" data-toggle="modal" data-target="#photo-modal" ><img class="img-responsive" width="400px" src="<?= $user->image_path_and_placeholder(); ?>" alt=""></a>                    
                </div>
                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="col-md-6 col-md-offset-">
                        <div class="form-group">
                            <label for="image">Image:</label>
                            <input type="file" name="file">
                        </div>
                        <div class="form-group">
                            <label for="username">User Name:</label>
                            <input type="text" name="username" class="form-control" value="<?= $user->username; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="first_name" value="<?= $user->first_name; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="last_name" value="<?= $user->last_name; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" required value="<?= $user->password; ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <a id="user-id" class="btn btn-danger delete_button" href="delete_user.php?id=<?= $user->id; ?>">Delete</a>
                            <input type="submit" name="update" value="Update" class="btn btn-primary pull-right">
                        </div>                   

                    </form>




                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

    <?php include("includes/footer.php"); ?>