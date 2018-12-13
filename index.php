<?php include("includes/header.php"); ?>
<?php 
$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;
$items_per_page = 12;
$items_total_count = Photo::count_all();
$paginate = new Paginate($page, $items_per_page, $items_total_count);
$sql = "SELECT * FROM photos ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";
$photos = Photo::find_by_query($sql);


    // $photos = Photo::find_all();

?>

<!-- <div class="row"> -->
    <?php include('includes/image_carousol.php') ?>
    <!-- Blog Entries Column -->
    <div class="col-md-12">

        <div class=" row thumbnail">    
            <?php   foreach ($photos as $photo): ?>
                <div class="col-xs-6 col-md-3">
                    <a href="photo.php?id=<?php echo $photo->id ?>" class="thumbnail">
                        <img class="img_width" src="admin/<?php echo $photo->picture_path(); ?>" alt="">
                    </a>    
                </div>      
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-5">
                <ul class="pagination">
                    <?php 

                    if ($paginate->page_total() > 1)
                    {
                        if ($paginate->has_next()) {
                            echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";                            
                        }
                        for ($i = 1; $i <=$paginate->page_total(); $i++) {
                            if ($i == $paginate->current_page) {

                                echo "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                            }else {
                                echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                            }
                        }

                        if ($paginate->has_previous()) {
                            echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                        }

                    }


                    ?>
                    <!-- <li class="previous"><a href="">Previous</a></li> -->
                </ul>
            </div>
        </div>


    </div>

    <!-- <div class="container bg-primary"> -->
        <div class="team">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 text-center">  
                        <h2><span class="ion-minus"></span>Our Team<span class="ion-minus"></span></h2>
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis  dis parturient montes, nascetur ridiculus </p><br>
                    </div> 
                </div>

                <div class="row text-center">

                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <img class="img-rounded" alt="team-photo" src="https://images.pexels.com/photos/295821/pexels-photo-295821.jpeg?h=350&auto=compress&cs=tinysrgb" width="100%"> 
                        
                        <div class="team-member">

                            <h4>John Doe</h4>

                            <p>Web developer</p>

                        </div>
                        
                        <p class="social">
                            <a href="#"><span class="fa fa-facebook-square"></span></a>
                            <a href="#"><span class="fa fa-twitter-square"></span></a>
                            <a href="#"><span class="fa fa-linkedin-square"></span></a>
                            <a href="#"><span class="fa fa-google-plus-square"></span></a>
                        </p>

                    </div> <!--col-lg-4 -->
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <img class="img-rounded" alt="team-photo" src="https://images.pexels.com/photos/428333/pexels-photo-428333.jpeg?h=350&auto=compress&cs=tinysrgb" width="100%">
                        
                        <div class="team-member">

                            <h4>Jack Doe</h4>

                            <p>Web designer</p>

                        </div>
                        
                        <p class="social">
                            <a href="#"><span class="fa fa-facebook-square"></span></a>
                            <a href="#"><span class="fa fa-twitter-square"></span></a>
                            <a href="#"><span class="fa fa-linkedin-square"></span></a>
                            <a href="#"><span class="fa fa-google-plus-square"></span></a>
                        </p>

                    </div> <!--col-lg-4 -->
                    
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <img class="img-rounded" alt="team-photo" src="https://images.pexels.com/photos/295821/pexels-photo-295821.jpeg?h=350&auto=compress&cs=tinysrgb" width="100%"> 
                        
                        <div class="team-member">

                            <h4>James</h4>

                            <p>CEO</p>

                        </div>
                        
                        <p class="social">
                            <a href="#"><span class="fa fa-facebook-square"></span></a>
                            <a href="#"><span class="fa fa-twitter-square"></span></a>
                            <a href="#"><span class="fa fa-linkedin-square"></span></a>
                            <a href="#"><span class="fa fa-google-plus-square"></span></a>
                        </p>

                    </div> <!-- col-lg-4 -->

                </div>  <!-- row text-center -->
                
            </div>    
        </div>
    <!-- </div> -->



    <!-- Blog Sidebar Widgets Column -->
    <!-- <div class="col-md-4"> -->


       <?php //include("includes/sidebar.php"); ?>



       <!-- </div> -->
       <!-- /.row -->

       <?php include("includes/footer.php"); ?>
