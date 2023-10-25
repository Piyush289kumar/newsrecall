<!DOCTYPE html>
<html class="no-js">

<head>
    <?php include("metalinks.php"); ?>
</head>

<body>
    <?php include("header.php");
    include("admin/config.php");
    ?>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-8">
                <div class="row">
                <?php
                    if (isset($_GET['cate_id'])) {
                        $cate_id_by_addbar = $_GET['cate_id'];
                    }
                    $sql_total_post_record = "SELECT * from news_paper WHERE news_id = {$cate_id_by_addbar}" or die("Query Failed !! --> sql_total_post_record");
                    $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record);
                    if (mysqli_num_rows($result_sql_total_post_record) > 0) {
                        while ($row = mysqli_fetch_assoc($result_sql_total_post_record)) {
                            ?>
                            <h5><?php echo 'Date : '. $row['date'] ?> <?php echo " | PDF : ".$row['title'] ?></h5>

                    <embed src="<?php echo 'admin/upload/'.$row['pdf'] ?>" type="application/pdf" style="height: 50rem;">
                    
                <?php }}?>
                </div>
            </div>


            <!-- Pagenation -->

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
        </div>
    </div>
    <!-- Right section -->
    <?php include("footer.php"); ?>
</body>

</html>