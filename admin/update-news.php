<?php include "header.php";
if ($_SESSION['user_role'] == 0) {
    echo ("<script>window.location.href='$hostname/admin/'</script>");
};
include("config.php");
$user_id_getaddbar = $_GET['post_id'];
if (isset($_POST['submit'])) {
    if (empty($_FILES['new-image']['name'])) {
        $save_img_name =   $_POST['old-image'];
    } else {
        if (isset($_FILES['new-image'])) {
            $file_name = $_FILES['new-image']["name"];
            $file_tmp = $_FILES['new-image']["tmp_name"];
            $file_type = $_FILES['new-image']["type"];
            $file_size = $_FILES['new-image']["size"];
            $file_ext = strtolower(end(explode('.', $file_name)));
            $allow_extension = array("jpg","jpeg","png","webp");
            $file_error = array();
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] = "This extension file not allowed, Please choose a JPG, JPEG, PNG or WEBP file.";
            }
            if ($file_size > 2097152) {
                $file_error[] = "Image must be 2mb or lower.";
            }
            $save_img_name =  date("d_M_Y_h_i_sa") . "_" . basename($file_name);
            $img_save_target = "upload/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name);
            } else {
?>
                <div style="background:lightcoral; color:aliceblue; font-size:larger;">
                    <?php
                    print_r($file_error);
                    die(); ?>
                </div><?php
                    }
                }
            }
            $title = mysqli_real_escape_string($conn, $_POST['title']);
            $des = mysqli_real_escape_string($conn, $_POST['des']);
            $sql_update_user = "UPDATE news_paper SET title = '{$title}', des = '{$des}', pdf = '{$save_img_name}' WHERE news_id ='{$user_id_getaddbar}'";
            if (mysqli_query($conn, $sql_update_user)) {
                echo ("<script>window.location.href='$hostname/admin/news_paper.php'</script>");
            }
        }
                        ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify News Headlight Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->
                <!-- PHP CODE -->
                <?php include("config.php");
                $sql_userdata_show_by_id = "SELECT * FROM news_paper WHERE news_id = {$user_id_getaddbar}";
                $result_sql_userdata_show_by_id = mysqli_query($conn, $sql_userdata_show_by_id) or die("Query Die!!");
                if (mysqli_num_rows($result_sql_userdata_show_by_id) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_userdata_show_by_id)) {
                ?>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                            <div class="form-group">
                                <input type="hidden" name="news_id" class="form-control" value="<?php echo $row['news_id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" value="<?php echo $row['title'] ?>" placeholder="" required>
                            </div>
                            <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="des" class="form-control" 
                            rows="5"><?php echo ($row['des']) ?></textarea>
                    </div>
                            <div class="form-group">
                                <label for="">News image</label>
                                <input type="file" name="new-image">
                                <img src="upload/<?php echo $row['pdf']; ?>" height="150px" style="border-radius: 12px; margin-top:12px;">
                                <input type="hidden" name="old-image" value="<?php echo $row['pdf']; ?>">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                        </form>
                        <!-- /Form -->
                <?php
                    }
                } ?>
                <!-- PHP CODE -->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>