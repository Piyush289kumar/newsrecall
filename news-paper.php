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
    .news_title p:hover{
        color: #fff;
    }
    .news_title:hover{
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

  <div class="card_wrapper my-2">
    <?php
    include("config.php");
    if (isset($_GET['page_index'])) {
      $page_index_by_addbar = $_GET['page_index'];
    } else {
      $page_index_by_addbar = 1;
    }
    $record_limi = 20;
    $offset = ($page_index_by_addbar - 1) * $record_limi;
    $sql_show_user = "SELECT * FROM news_paper
                              LEFT JOIN user ON news_paper.author = user.user_id
                              ORDER BY  news_paper.news_id DESC LIMIT {$offset},{$record_limi}";
    $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
    if (mysqli_num_rows($result_sql_show_user) > 0) {
      while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
    ?>
        <!-- card-body block Start -->
        <div class="card_body">
          <img src="admin/upload/<?php echo $row['pdf'] ?>" alt="" />
           <a href="news_single.php?post_news_id=<?php echo ($row['news_id']) ?>" class="news_title"><p> <?php echo substr($row['title'],0,135) ?>...</p></a>
        </div>
        <!-- card-body block end -->
    <?php
      }
    } ?>
  </div>
  <?php
  $sql_total_post_record = "SELECT * FROM news_paper
    LEFT JOIN user ON news_paper.author = user.user_id" or die("Query Failed !! --> sql_total_post_record");
  $result_sql_total_post_record = mysqli_query($conn, $sql_total_post_record);
  if (mysqli_num_rows($result_sql_total_post_record) > 0) {
    $total_post_record = mysqli_num_rows($result_sql_total_post_record);
    $total_page = ceil($total_post_record / $record_limi);
    echo ("<ul class='pagination admin-pagination mb-3'>");
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

  <?php include("footer.php"); ?>
  </body>
</html>