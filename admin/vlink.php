<?php include "header.php";
include("config.php");

// UPDATION CODE

if (isset($_POST['submit'])) {

    $post_vlink = mysqli_real_escape_string($conn, $_POST['v_post']);

    $sql_update_post = "UPDATE video_tb SET v_post_vlink = '{$post_vlink}' WHERE vid = 1";

    $result_sql_update_post = mysqli_query($conn, $sql_update_post);
    if ($result_sql_update_post) {
        echo ("<script>window.location.href='$hostname/admin/post.php'</script>");
    } else {
        echo "<div class='alert alert-danger'>VIDEO LINK NOT UPDATE !!</div>";
    }

}
 ?>
 
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">News Recall Link Update</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                
                
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="post_id" class="form-control" value="<?php echo ($row['post_id']) ?>"
                            placeholder="">
                    </div>
                    
                   
                    <div class="form-group">
                        <label for="exampleInputPassword1">Video Section</label>
                        <select name="v_post" class="form-control">
                            <option disabled selected> Select Post</option>

                            <?php
                            
                            $sql_category_list = "SELECT * from post ORDER BY post_id DESC" or die("Query Die!! --> sql_category_list");
                            $result_sql_category_list = mysqli_query($conn, $sql_category_list);

                            if (mysqli_num_rows($result_sql_category_list) > 0) {
                                while ($row = mysqli_fetch_assoc($result_sql_category_list)) {
                            ?>
                            <option value="<?php echo ($row['post_id']) ?>"><?php echo ($row['title']) ?>
                            </option>

                            <?php
                                }
                            }
                            ?>

                        </select>
                    </div>
                   
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
                <!-- Form End -->
                
                
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
