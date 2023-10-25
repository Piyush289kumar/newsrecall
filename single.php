<!DOCTYPE html>
<html class="no-js">

<head>
    <?php include("metalinks.php"); ?>
    
       <style>
     .image1 {
        width: 50px;
        position: relative;
        top: 55px;
        left: -40%;
        border: 1px solid #000000;
        z-index: 2;
        background: none;
        border: 2px solid transparent;
      }
         </style>
</head>

<body style="background-color: #f9f7f1;">
   
    <?php include("header.php"); ?>
    
    
  
    <!-- Goes Online Section -->
    <div class="container-fluid">
        <div class="row mt-2" style="font-size: 18px; text-align: center; border-bottom: 3px solid #e1412e;border-radius:12px;">
            <div class="col-3 text-left newsrecall_subText" style="display: flex; justify-content: left; align-items: flex-end;">
                <i class="fa-brands fa-chrome" style="color: #129af6; margin-bottom:5px;"></i> &nbsp;&nbsp;newsrecall.in
            </div>
            <?php
            include("config.php");
            $page_index_by_addbar = $_GET['post_id'];
            $sql_show_post_record = "SELECT *  FROM post
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN user ON post.author = user.user_id
                        WHERE post.post_id = {$page_index_by_addbar}" or die("Query Failed!! --> sql_show_post_record");
            $result_sql_show_post_record = mysqli_query($conn, $sql_show_post_record);
            if (mysqli_num_rows($result_sql_show_post_record) > 0) {
                while ($row = mysqli_fetch_assoc($result_sql_show_post_record)) {
            ?>
                    <div class="col-6 newsrecall" style="display: flex; justify-content: center; align-items: flex-end; font-size:65px; margin-bottom:0px; color:#b41212;  font-weight: 900;"><span style="color:#021c50;">न्यूज़&nbsp;</span>रिकॉल</div>
                    <div class="col-3 text-left newsrecall_subText" style="display: flex; justify-content: right; align-items: flex-end;"> &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $row['post_date']; ?></div>
        </div>


        <div class="row">
            <div class="col-lg-6 text-center">
                <!-- <img src="admin/upload/<php echo $row['post_img']; ?>" alt="unlink" srcset="" class="image_post" style="border:1px solid trasnparent; border-radius: 12px;"> -->
                <img class="image1" src="https://newsrecall.in/images/overlay.png" />
                <img class="image2" src="admin/upload/<?php echo $row['post_img']; ?>" alt="unlink" style="border:1px solid trasnparent; border-radius: 12px;" />

            </div>
            <div class="col-lg-6 mt-2" style="margin-bottom:0%;">
                <p class="post_des_title" style="color:#021c50; font-size:30px; font-weight:bolder;"><?php echo $row['title'] ?></p>
                <div class="col-12">
                    <p class="post_des_text" style="border-bottom:1px solid gray; padding-bottom:5px;">न्यूज़ रिकॉल<span style="color:gray;"> | जबलपुर</span></p>
                </div>
                <div class="row">
                    <div class="col-6">
                        <p class="post_des_text" style="text-align: justify;border-right:1px solid gray;padding-right: 12px;margin-right: -5%; font-weight:400;"><span style="color: red;">संवाददाता</span> : <?php echo substr($row['description'], 0, strlen($row['description']) / 2); ?>
                        </p>
                    </div>
                    <div class="col-6">
                        <p class="post_des_text" style="text-align: justify;"><?php echo substr($row['description'], strlen($row['description']) / 2 - 1, -1); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- Video -->
        <?php
                    if ($row['vlink'] == !null) {
        ?>
            <div class="offset-md-1  col-md-10 px-5 text-center mb-3">
                <h5 style="border-bottom: 2px solid rgb(216, 0, 0); border-radius:12px">
                    <span style="color: rgb(216, 0, 0);">वीडियो</span>
                </h5>
            </div>
            <div class="offset-md-1 col-md-10 px-5 p-2">
                <iframe width="100%" height="450" src="https://www.youtube.com/embed/<?php echo $row['vlink'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
                        picture-in-picture; web-share" allowfullscreen>
                </iframe>
            </div>
        <?php
                    }
        ?>
        <!-- Video -->


<?php }
            } ?>
    </div>
    <!-- Goes Online Section -->
    
    <div class="col-md-12 text-center mb-5">
    <a href="index.php" class="btn btn-primary" style="border: 1px solid transparent; border-radius: 12px; margin-top: 50px; width:250px;">
    <i class="fa-solid fa-house">&nbsp;&nbsp;होम</i></a>
    </div>





    <?php include("footer.php"); ?>
</body>

</html>