<?php include "header.php"; ?>
<div id="admin-content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1 class="admin-heading">Add News Headlight</h1>
      </div>
      <div class="col-md-offset-3 col-md-6">
         <!-- Form Start -->
        <?php
        include("config.php");
        if (isset($_FILES['fileToUpload'])) {
          $info = getimagesize($_FILES['fileToUpload']['tmp_name']);
          if (isset($info['mime'])) {
            if ($info['mime'] == "image/jpeg") {
              $img = imagecreatefromjpeg($_FILES['fileToUpload']['tmp_name']);
            } elseif ($info['mime'] == "image/png") {
              $img = imagecreatefrompng($_FILES['fileToUpload']['tmp_name']);
            } elseif ($info['mime'] == "image/webp") {
              $img = imagecreatefromwebp($_FILES['fileToUpload']['tmp_name']);
            } else {
              echo "Please select JPG, PNG or WEBP file.";
            }
            if (isset($img)) {
              $output_img =  date("d_M_Y_h_i_sa") . "_" . basename($_FILES['fileToUpload']['name']) . ".webp";
              // $output_img = time() . '.jpg';
              imagewebp($img, "upload/" . $output_img, 15);
              $title = mysqli_real_escape_string($conn, $_POST['title']);
              $des = mysqli_real_escape_string($conn, $_POST['postdesc']);
              $post_date = date("d M, Y");
              $post_author = $_SESSION['user_id'];
              $sql_insert_user = "INSERT INTO news_paper (title, des, date, author, pdf)
                    values('{$title}','{$des}','{$post_date}','{$post_author}','{$output_img}')";
              if (mysqli_query($conn, $sql_insert_user)) {
                echo ("<script>window.location.href='$hostname/admin/news_paper.php'</script>");
              }
            }
          }
        }
        ?>
        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off" enctype="multipart/form-data">
          <div class="form-group">
            <label>News Headlight Title</label>
            <input type="text" name="title" class="form-control" placeholder="Title" required>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1"> Description</label>
            <textarea name="postdesc" class="form-control" rows="5" required></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">News Picture</label>
            <input type="file" name="fileToUpload" required>
          </div>
          <input type="submit" name="save" class="btn btn-primary" value="Save" />
        </form>
        <!-- Form End-->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>