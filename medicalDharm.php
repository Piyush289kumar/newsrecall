<!DOCTYPE html>
<html class="no-js">

<head>
    <?php include("metalinks.php"); ?>
    <style>
        .card_wrapper {
            display: flex;
            flex-wrap: wrap;
        }

        .card_body {
            display: flex;
            flex: 1 0 21%;
            /* explanation below */
            background-color: #fff;
            color: black;
            border: 1px solid gainsboro;
            border-radius: 5px;
            overflow: hidden;
            margin: 5px;
            width: 85%;
            height: 90px;
            cursor: pointer;
            transition: all 0.3s;
        }

        .card_body:hover {
            color: #fff;
            background-color: #021c50;
        }


        .card_body img {
            height: 100%;
            width: 45%;
        }

        .news_title {
            padding: 10px 5px;
            width: 65%;
            font-size: 14px;
        }

        .news_title p:hover {
            color: #fff;
        }

        .news_title:hover {
            color: #fff;
        }

        @media (max-width: 600px) {
            .card_wrapper {
                flex-direction: column;
                align-items: center;
            }

            .card_body img {
                height: 75px !important;
                width: 30%;
            }

            .news_title {
                font-size: 14px !important;
                padding: 7px 5px !important;
            }
        }

        @media (max-width: 900px) {
            .card_body {
                height: 60px;
            }

            .news_title {
                font-size: 8px;
                padding: 4px 2px;
            }
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>


    <body>
        <div class="row">
            <div class="col-md-12 text-center">
                <a href="index.php" class="btn btn-primary" style="border: 1px solid transparent; border-radius: 12px; margin-top: 5px; width:250px;">
                    <i class="fa-solid fa-house">&nbsp;&nbsp;होम</i></a>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12 text-center">
                <h5 class="mt-4 pb-2" style="border-bottom: 2px solid grey;">मेडिकल व हेल्थ अपडेट, धर्म, संस्कार
</h5>
                
            </div>
        </div>

        <div class="card_wrapper my-2">
            <?php
            include("config.php");
            if (isset($_GET['cate_id'])) {
                $cate_id_by_addbar = $_GET['cate_id'];
            } else {
                $cate_id_by_addbar = 66;
            }
            if (isset($_GET['page_index'])) {
                $page_index_by_addbar = $_GET['page_index'];
            } else {
                $page_index_by_addbar = 1;
            }
            $record_limi = 10;
            $offset = ($page_index_by_addbar - 1) * $record_limi;
            $sql_show_user = "SELECT *  FROM post
    LEFT JOIN category ON post.category = category.category_id
    LEFT JOIN user ON post.author = user.user_id
    WHERE post.category = '{$cate_id_by_addbar}'
    ORDER BY post.post_id DESC LIMIT {$offset},{$record_limi}";

            $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
            if (mysqli_num_rows($result_sql_show_user) > 0) {
                while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
            ?>
                    <!-- card-body block Start -->
                    <div class="col-md-3 mt-3"  style="border: 2px solid grey; border-radius: 12px; overflow:hidden ;height:190px;">
                        <iframe width="100%" height="110%" src="https://www.youtube.com/embed/<?php echo $row['vlink'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; 
                    picture-in-picture; web-share" allowfullscreen style="
    margin-bottom: -15px;
">
                        </iframe>
                    </div>
                    <!-- card-body block end -->
            <?php
                }
            } ?>
        </div>
        <?php
        $sql_total_post_record = "SELECT *  FROM post
        LEFT JOIN category ON post.category = category.category_id
        LEFT JOIN user ON post.author = user.user_id
        WHERE post.category = '{$cate_id_by_addbar}'" or die("Query Failed !! --> sql_total_post_record");
        $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record);
        if (mysqli_num_rows($result_sql_total_post_record) > 0) {
            $total_post_record = mysqli_num_rows($result_sql_total_post_record);
            $total_page = ceil($total_post_record / $record_limi);
            echo ("<ul class='pagination admin-pagination mb-3'>");
            if ($page_index_by_addbar > 1) {
                echo ("<li><a href='$hostname/medicalDharm.php?page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($page_index_by_addbar == $i) {
                    $active_page = "active";
                } else {
                    $active_page = "";
                }
                echo ("<li class=$active_page><a href='$hostname/medicalDharm.php?page_index=$i'>$i</a></li>");
            }
            if ($page_index_by_addbar < $total_page) {
                echo ("<li><a href='$hostname/medicalDharm.php?page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
            }
            echo ("</ul>");
        }
        ?>

        <?php include("footer.php"); ?>
    </body>

</html>