<!DOCTYPE html>
<html class="no-js">

<head>
    <?php include("metalinks.php"); ?>
</head>

<body>
   
    <?php include("header.php"); ?>
    
    
     <div class="row">
    <div class="col-md-12 text-center">
    <a href="index.php" class="btn btn-primary" style="border: 1px solid transparent; border-radius: 12px; margin-top: 5px; width:250px;">
    <i class="fa-solid fa-house">&nbsp;&nbsp;होम</i></a>
    </div>

    <div class="container-fluid">
        <div class="row mt-4">
            <!-- Left section -->
            <div class="col-md-8">

                <?php
               $page_index_by_addbar = $_GET['post_id'];


                $sql_show_post_record = "SELECT *  FROM post
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN user ON post.author = user.user_id
                        WHERE post.post_id = {$page_index_by_addbar}" or die("Query Failed!! --> sql_show_post_record");

                $result_sql_show_post_record = mysqli_query($conn, $sql_show_post_record);
                if (mysqli_num_rows($result_sql_show_post_record) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_post_record)) {
                ?>

                        <div class="row">
                            <div class="col-12">
                                <h2><?php echo $row['title'] ?></h2>
                            </div>
                            <div class="col-12 my-3">
                                <img src="admin/upload/<?php echo $row['post_img']; ?>" alt="" srcset="" style="border-radius: 12px;">
                            </div>
                            <div class="col-12">
                                <!-- <h3>Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit sint unde debitis neque
                            excepturi suscipit.</h3> -->
                            </div>
                            <!-- postDetails -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-12 flexuser">
                                            <img src="admin/upload/<?php echo $row['img']; ?>" alt="Error" srcset="" id="userimg">
                                            <div class="userinfo">
                                                <p id="usericon"><i class="fa-solid fa-user"></i><?php echo ' '. $row['username']; ?></p>
                                                <p id="usericon"><i class="fa-solid fa-calendar-days"></i><?php echo ' '. $row['post_date']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- postDetails -->
                            <!-- PostDescription -->
                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <p id="PostDescription"><?php echo $row['description'] ?></p>
                                </div>
                            </div>
                            
                            
                            
                             <!-- Video -->
                             <?php
                            if ($row['vlink'] == !null) {
                                ?>
                                <div class="col-md-12 text-center mb-3">
                                    <h5 style="border-bottom: 2px solid rgb(216, 0, 0); border-radius:12px">
                                        <span style="color: rgb(216, 0, 0);">वीडियो</span>
                                    </h5>
                                </div>
                                <div class="col-md-12 p-2">
                                    <iframe width="100%" height="450"
                                        src="https://www.youtube.com/embed/<?php echo $row['vlink'] ?>" title="YouTube video player"
                                        frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
                        picture-in-picture; web-share" allowfullscreen>
                                    </iframe>
                                </div>
                                <?php
                            }
                            ?>
                            <!-- Video -->
                            
                            <!-- PostDescription -->
                        </div>
                <?php }
                } ?>
            </div>
            <!-- Left section -->



            <!-- Right section -->
            <div class="col-md-4">
                <!-- Video section -->
                <?php include("video_section.php"); ?>
                <!-- Video section -->
                <!-- Card -->
                <?php include("sidebar_latest_news.php"); ?>
                <!-- Card -->
            </div>
            <!-- Right section -->

        </div>
    </div>
    <!-- Card Section
    <php include("card_section.php"); ?>
    Card Section -->

    <?php include("footer.php"); ?>
</body>

</html>