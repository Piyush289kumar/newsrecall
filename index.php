<!DOCTYPE html>
<html class="no-js">

<head>
    <?php include("metalinks.php"); ?>
</head>

<body>
    <?php include("header.php");
    include("config.php"); ?>
    <section class="banner">
        <!-- comment testing for git hub  -->
        <div class="banner-main-content mb-3">
            <h2 style="padding-left: 4%;">ई-समाचार</h2>
            <!-- <h3>World's Leading Tech News Portal</h3> -->
            <div class="hot-topic">
                <!-- Endorsements start block -->
                <!-- endorsementSmallDevice section Start -->
                <section class="endorsements endorsementSmallDevice">
                    <div class="row">
                        <div class="col-md-12" style="overflow: scroll;">
                            <section class="pt-1 pb-1">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-10">
                                        </div>
                                        <div class="col-12">
                                            <div id="carouselExampleIndicators30" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <div class="row">
                                                            <?php
                                                            include("config.php");
                                                            if (isset($_GET['page_index'])) {
                                                                $page_index_by_addbar = $_GET['page_index'];
                                                            } else {
                                                                $page_index_by_addbar = 1;
                                                            }
                                                            $sql_show_user = "SELECT * FROM news_paper
                              LEFT JOIN user ON news_paper.author = user.user_id
                              ORDER BY  news_paper.news_id DESC LIMIT 0,1";
                                                            $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                                                            if (mysqli_num_rows($result_sql_show_user) > 0) {
                                                                while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                                                            ?>
                                                                    <!-- Card Section Start -->
                                                                    <div class="col-md-12" data-aos="flip-left">
                                                                        <div class="card text-center" style="
                                  color: grey;
                                  font-family: 500;
                                  font-size: small;
                                ">
                                                                            <div class="card-body">
                                                                                <img class="card-text" src="admin/upload/<?php echo $row['pdf'] ?>" id="img_newsrecall">
                                                                            </div>
                                                                            <span style="
                                    text-align:left;
                                    line-height:1.1rem;

                                    color: rgba(0, 0, 0, 0.9);
                                    font-weight: 800;
                                    font-size: larger;
                                  " class="mb-1 px-2"><?php echo substr($row['title'], 0, 135) . '....' ?></span>

                                                                            <!-- View More button -->
                                                                            <div class="col-md-12 text-center mb-2" data-aos="zoom-in" data-aos-duration="800">
                                                                                <a href="news_single.php?post_news_id=<?php echo ($row['news_id']) ?>" class="btn btn-primary mt-2" style="
                    padding: 6px 50px;
                    background: #212529 !important;
                    color:white;
                    border:none;
                    border-radius: 24px;
                  ">देखिए पूरी खबर&#160;<i class="fa-solid fa-arrow-right"></i></a>
                                                                            </div>
                                                                            <!-- View More button -->


                                                                        </div>
                                                                    </div>
                                                                    <!-- Card Section End -->
                                                            <?php
                                                                }
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </section>
                        </div>
                    </div>
                </section>
                <!-- endorsementSmallDevice section Start -->
                <!-- Endorsements End block -->
            </div>
        </div>
        <!-- <div class="banner-sub-content" style="margin-bottom:-100px ;">
            <h2 style="padding-left: 4%;"><a href="breaking-news.php"  style="
                    padding: 6px 15px;
                background: transparent;
                    color:black;
                    border-bottom:#5A5A5A;
                    border-radius: 24px;
                  " >ब्रेकिंग न्यूज़ <i class="fa-solid fa-arrow-right"></i></a></h2>
            
            <div class="hot-topic" style="z-index: 1;">
                <php
                $sql_show_user = "SELECT * FROM video_tb
                                  LEFT JOIN post ON post.post_id = video_tb.v_post_vlink";
                $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                if (mysqli_num_rows($result_sql_show_user) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                ?>
                 <div class="col-12" id="frameHeigh"  style="border: 2px solid grey; border-radius: 12px; overflow:hidden; height:90%;">
                        <iframe width="100%" height="110%" src="https://www.youtube.com/embed/<php echo $row['vlink'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
                    picture-in-picture; web-share" allowfullscreen>
                        </iframe>
                 </div>
                <php
                    }
                }
                ?>

            </div>
             
        </div> -->
    </section>
    <section class="banner">
        <div class="banner-main-content" style="z-index: 2;margin-bottom:-90px ;">
            <h2 style="padding-left: 4%;"><a href="pramukh-news.php" style="
                    padding: 6px 15px;
                background: transparent;
                    color:black;
                    border-bottom:#5A5A5A;
                    border-radius: 24px;
                  ">प्रमुख समाचार<i class="fa-solid fa-arrow-right"></i></a></h2>
            <!-- <h3>World's Leading Tech News Portal</h3> -->
            <div class="hot-topic">

                <?php
                $sql_show_user = "SELECT * FROM video_three_tb
                                  LEFT JOIN post ON post.post_id = video_three_tb.post_vlink";
                $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                if (mysqli_num_rows($result_sql_show_user) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                ?>
                        <div class="col-12" id="frameHeigh" style="border: 2px solid grey; border-radius: 12px; overflow:hidden; height:90%;">
                            <iframe width="100%" height="110%" src="https://www.youtube.com/embed/<?php echo $row['vlink'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
                    picture-in-picture; web-share" allowfullscreen>
                            </iframe>
                        </div>
                <?php
                    }
                }
                ?>

            </div>

        </div>
        <div class="banner-sub-content" style="z-index: 3; margin-bottom:-90px ;">
            <h2 style="padding-left: 4%;"><a href="medicalDharm.php" style="
                    padding: 6px 15px;
                background: transparent;
                    color:black;
                    border-bottom:#5A5A5A;
                    border-radius: 24px;
                  ">स्टोरी<i class="fa-solid fa-arrow-right"></i></a></h2>
            <div class="hot-topic">
                <?php
                $sql_show_user = "SELECT * FROM video_sec_tb
                                  LEFT JOIN post ON post.post_id = video_sec_tb.v_post_link";
                $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                if (mysqli_num_rows($result_sql_show_user) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                ?>
                        <div class="col-12" id="frameHeigh" style="border: 2px solid grey; border-radius: 12px; overflow:hidden; height:90%;">
                            <iframe width="100%" height="110%" src="https://www.youtube.com/embed/<?php echo $row['vlink'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
                    picture-in-picture; web-share" allowfullscreen>
                            </iframe>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

        </div>
    </section>
    <hr>
    <!-- <main>
        <section class="main-container-left">
            <h2>प्रचार</h2>
            <div class="container-top-left">
                <article>
                    <php
                    $sql_show_user = "SELECT * FROM post
                                  LEFT JOIN ad_table ON post.post_id = ad_table.adp_id
                                  where ad_table.ad_id = 1";
                    $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                    if (mysqli_num_rows($result_sql_show_user) > 0) {
                        while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                    ?>
                            <img src="<php echo 'admin/upload/' . $row['post_img'] ?>" alt="unlink" style="border-radius: 14px;">
                            <div>
                                <h3><php echo $row['title'] ?></h3>
                                <p>
                                    <php echo substr($row['description'], 0, 120) . '....' ?>
                                </p>
                                <a href="single.php?post_id=<php echo ($row['post_id']) ?>">देखिए <span>>></span></a>
                            </div>
                    <php
                        }
                    }
                    ?>
                </article>
            </div>

        </section>
        <section class="main-container-right">
            <h2>Top 3</h2>
            PHP CODE
            <php
            $sql_show_user = "SELECT * FROM post
            LEFT JOIN top_post ON post.post_id = top_post.tp_id
            LEFT JOIN user ON post.author = user.user_id
            limit 3";
            $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
            if (mysqli_num_rows($result_sql_show_user) > 0) {
                while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
            ?>
                    <article style="border-top: 1px solid #0081c9; border-bottom: 1px solid #0081c9; border-radius:10px;">
                        <div>
                            <h2><php echo $row['title'] ?></h2>
                          <p>
                                    <php echo substr($row['description'], 0, 120) . '....' ?>
                                </p>
                            <p class="picon" style="font-size:12px; margin: 4px 4px;">
                                <i class="fa-solid fa-user" style="padding-right: 5px;"></i><php echo $row['username']; ?>
                            </p>
                            <p class="picon" style="font-size:12px; margin: 4px 4px;">
                                <i class="fa-solid fa-calendar-days" style="padding-right: 5px;"></i><php echo $row['post_date']; ?>
                            </p>
                            <a href="single.php?post_id=<php echo ($row['post_id']) ?>">देखिए <span>>></span></a>
                        </div>
                        <img src="admin/upload/<php echo $row['post_img']; ?>" alt="unlink">
                    </article>
            <php
                }
            }
            ?>
        </section>
    </main> -->
    <!-- Card Section -->
    <!-- button -->
    <div class="col-md-12 text-center">
        <a href="index.php" class="btn my-1" style="border: 1px solid transparent; border-radius: 12px; margin-top: 5px; padding:6px 65px; font-size:25px;">
            &#160;&#160;Top 10 खबरें&#160;&#160;</a>
    </div>
    <!-- button -->

    <section>
        <div class="row m-4">
            <?php
            include("config.php");
            if (isset($_GET['page_index'])) {
                $page_index_by_addbar = $_GET['page_index'];
            } else {
                $page_index_by_addbar = 1;
            }
            $record_limi = 10;
            $offset = ($page_index_by_addbar - 1) * $record_limi;
            $sql_show_user = "SELECT * FROM post
            LEFT JOIN top_post ON post.post_id = top_post.tp_id
            LEFT JOIN user ON post.author = user.user_id
            limit 10";

            $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
            if (mysqli_num_rows($result_sql_show_user) > 0) {
                while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
            ?>
                    <div class="col-md-3 mb-4">
                        <div class="card" style="border: 1px solid grey; border-radius: 12px;">
                            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                                <a href="single.php?post_id=<?php echo ($row['post_id']) ?>">
                                    <img src="admin/upload/<?php echo $row['post_img']; ?>" alt="unlink" class="img-fluid post_img" style="border: 1px solid transparent; border-radius: 12px;" /></a>
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text"><?php echo substr($row['title'], 0, 120) . '....' ?></p>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <p class="piconcart" style="margin: 4px 4px;"><i class="fa-solid fa-user" style="padding-right: 5px;"></i><?php echo $row['username']; ?></p>
                                        </div>
                                        <p class="piconcart" style="margin: 4px 4px;"><i class="fa-solid fa-calendar-days" style="padding-right: 5px;"></i><?php echo $row['post_date']; ?></p>
                                    </div>
                                </div>
                                <a href="single.php?post_id=<?php echo ($row['post_id']) ?>" class="btn btn-primary" style="background: #212529 !important; border: 1px solid transparent; border-radius: 12px; margin-top: 5px;">देखिए</a>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </section>
    <!-- Card Section -->

    <!-- button -->
    <div class="col-md-12 text-center">
        <a href="cardSection.php" class="btn btn-primary mb-3" style="border: 1px solid transparent; border-radius: 12px; margin-top: 5px; padding:6px 65px;">
            &#160;&#160;अन्य खबरे देखिए&#160;&#160;<i class="fa-solid fa-arrow-right"></i></a>
    </div>
    <!-- button -->
    <?php include("footer.php"); ?>
</body>

</html>