<!DOCTYPE html>
<html class="no-js">
<head>
    <?php include("metalinks.php"); ?>
</head>
<body>
    <?php include("header.php");
     include("admin/config.php");  ?>
    <div class="container-fluid">
        <div class="row mt-4">
            <?php
            if (isset($_GET['search'])) {
                $search_term = mysqli_real_escape_string($conn, $_GET['search']);
            }
            ?>
            <h4>We love : <?php echo "{$search_term}" ?></h4>
            <!-- Left section -->
            <div class="col-md-8">
                <div class="row">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <hr id="hrline" class="bg-primary border-2 border-top border-primary" style="width: 100%; height: 2px;">
                        </div>
                        <?php
                        ?>
                        <?php
                        if (isset($_GET['page_index'])) {
                            $page_index_by_addbar = $_GET['page_index'];
                        } else {
                            $page_index_by_addbar = 1;
                        }
                        $record_limi = 1;
                        $offset = ($page_index_by_addbar - 1) * $record_limi;
                        $sql_show_post_record = "SELECT *  FROM post
      LEFT JOIN category ON post.category = category.category_id
      LEFT JOIN user ON post.author = user.user_id
      WHERE post.title LIKE '%{$search_term}%' OR user.username LIKE '%{$search_term}%'
      ORDER BY post.post_id DESC LIMIT {$offset},{$record_limi}" or die("Query Failed!! --> sql_show_post_record");
                        $result_sql_show_post_record = mysqli_query($conn, $sql_show_post_record) or die("No Record Found!!");
                        if (mysqli_num_rows($result_sql_show_post_record) > 0) {
                            while ($row = mysqli_fetch_assoc($result_sql_show_post_record)) {
                        ?>
                                <!-- Card -->
                                <div class="col-12 my-1" id="postcover">
                                    <div class="row">
                                        <div class="col-md-5"><a href="single.php?post_id=<?php echo ($row['post_id']) ?>"><img src="admin/upload/<?php echo $row['post_img']; ?>" alt="Error" srcset="" style="border-radius: 12px;"></a></div>
                                        <div class="col-md-7">
                                            <div class="row">
                                                <div class="col-12">
                                                    <a href="single.php?post_id=<?php echo ($row['post_id']) ?>">
                                                        <p class="mt-0"><?php echo ($row['title']) ?></p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12" id="categroy_icon">
                                                    <p class="picon" style="margin:0; font-size: 12px; margin-right: 10px;"><i class="fa-solid fa-user" style="padding-right: 5px;"></i><?php echo ($row['username']) ?></p>
                                                    <p class="picon" style="margin: 0; font-size: 12px;"><i class="fa-solid fa-calendar-days" style="padding-right: 5px;"></i><?php echo ($row['post_date']) ?></p>
                                                </div>
                                                <div class="col-md-2">
                                                    <a href="single.php?post_id=<?php echo ($row['post_id']) ?>"><input type="button" value="Read more>>" class="btn btn-primary btnreadmore"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card -->
                        <?php
                            }
                        } 
                        else {
                            echo ("<div class='alert alert-danger'>No Result!!</div>");
                        } 
                        
                    $sql_total_post_record = "SELECT * from post WHERE post.title LIKE '%{$search_term}%'";
                    $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record) or die("Query Failed !! --> sql_total_post_record");
                    

                    if (mysqli_num_rows($result_sql_total_post_record) > 0) {
                        $total_post_record = mysqli_num_rows($result_sql_total_post_record);
                        $total_page = ceil($total_post_record / $record_limi);
                        echo ("<ul class='pagination admin-pagination'>");
                        if ($page_index_by_addbar > 1) {
                            echo ("<li><a href='$hostname/search.php?search={$search_term}&page_index=" . ($page_index_by_addbar - 1) . "'>Prev</a></li>");
                        }
                        for ($i = 1; $i <= $total_page; $i++) {

                            if ($page_index_by_addbar == $i) {
                                $active_page = "active";
                            } else {
                                $active_page = "";
                            }
                            echo ("<li class=$active_page><a href='$hostname/search.php?search={$search_term}&page_index=$i'>$i</a></li>");
                        }
                        if ($page_index_by_addbar < $total_page) {
                            echo ("<li><a href='$hostname/search.php?search={$search_term}&page_index=" . ($page_index_by_addbar + 1) . "'>Next</a></li>");
                        }
                        echo ("</ul>");
                    }?>
                        <!-- Pagenation -->
                        <!-- <div class="col-12">
                            <ul class="pagenation my-3">
                                <li class="pagenation_item">Prev</li>
                                <li class="pagenation_item">1</li>
                                <li class="pagenation_item">2</li>
                                <li class="pagenation_item">3</li>
                                <li class="pagenation_item">Next</li>
                            </ul>
                        </div> -->
                    </div>
                    <!-- Pagenation -->
                </div>
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
    </div>
    </div>
    </div>
    <?php include("footer.php"); ?>
</body>
</html>