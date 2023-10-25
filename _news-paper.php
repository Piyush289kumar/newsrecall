<!DOCTYPE html>
<html class="no-js">
<head>
    <?php include("metalink.php"); ?>
</head>
<body>
   <?php include "header.php";?>
<section>
    <div class="row m-4">
        <?php
        include("config.php");
        if (isset($_GET['page_index'])) {
            $page_index_by_addbar = $_GET['page_index'];
        } else {
            $page_index_by_addbar = 1;
        }
        $record_limi = 8;
        $offset = ($page_index_by_addbar - 1) * $record_limi;
        $sql_show_user = "SELECT * FROM news_paper
                              LEFT JOIN user ON news_paper.author = user.user_id
                              ORDER BY  news_paper.news_id DESC LIMIT {$offset},{$record_limi}";
        $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
        if (mysqli_num_rows($result_sql_show_user) > 0) {
            while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
        ?>
                <div class="col-md-3 mb-2">
                    <div class="card" style="border: 1px solid transparent; border-radius: 12px;">
                        <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                            <a href="news_single.php?post_news_id=<?php echo ($row['news_id']) ?>">
                                <img src="admin/upload/<?php echo $row['pdf']; ?>" alt="unlink" class="img-fluid" style="border: 1px solid transparent; border-radius: 12px;" /></a>
                            <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                            </a>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?php echo substr($row['title'], 0, 120). '....' ?></p>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <p class="piconcart" style="margin: 4px 4px;"><i class="fa-solid fa-user" style="padding-right: 5px;"></i><?php echo $row['username']; ?></p>
                                    </div>
                                    <p class="piconcart" style="margin: 4px 4px;"><i class="fa-solid fa-calendar-days" style="padding-right: 5px;"></i><?php echo $row['date']; ?></p>
                                </div>
                            </div>
                            <a href="news_single.php?post_news_id=<?php echo ($row['news_id']) ?>" class="btn btn-primary" style="border: 1px solid transparent; border-radius: 12px; margin-top: 5px;">देखिए</a>
                        </div>
                    </div>
                </div>
        <?php
            }
        }
        $sql_total_post_record = "SELECT * from news_paper" or die("Query Failed !! --> sql_total_post_record");
        $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record);
        if (mysqli_num_rows($result_sql_total_post_record) > 0) {
            $total_post_record = mysqli_num_rows($result_sql_total_post_record);
            $total_page = ceil($total_post_record / $record_limi);
            echo ("<ul class='pagination admin-pagination'>");
            if ($page_index_by_addbar > 1) {
                echo ("<li><a href='$hostname/news-paper.php?page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
            }
            for ($i = 1; $i <= $total_page; $i++) {
                if ($page_index_by_addbar == $i) {
                    $active_page = "active";
                } else {
                    $active_page = "";
                }
                echo ("<li class=$active_page><a href='$hostname/news-paper.php?page_index=$i'>$i</a></li>");
            }
            if ($page_index_by_addbar < $total_page) {
                echo ("<li><a href='$hostname/news-paper.php?page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
            }
            echo ("</ul>");
        }
        ?>
    </div>
</section>
</body>
</html>



