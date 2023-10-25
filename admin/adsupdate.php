<?php include "header.php";
include("config.php");

$post_id_by_addbar = $_GET['ad_id'];

if ($post_id_by_addbar == null) {
    echo ("<script>window.location.href='$hostname/admin/ads.php'</script>");
    
}

// UPDATION CODE

if (isset($_POST['submit'])) {
    $post_id = mysqli_real_escape_string($conn, $_POST['post']);
    $sql_update_post = "UPDATE ad_table SET adp_id = '{$post_id}' WHERE ad_id = '{$post_id_by_addbar}'";
    $result_sql_update_post = mysqli_query($conn, $sql_update_post);
    if ($result_sql_update_post) {
        echo ("<script>window.location.href='$hostname/admin/ads.php'</script>");
        
    } else {
        echo "<div class='alert alert-danger'>Ads News is Not Update !!</div>";
    }
}
 ?>
 
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <h1 class="admin-heading">Ads News Update</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form for show edit-->
                
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off">
                   
                    <div class="form-group">
                        <label for="exampleInputCategory">Post</label>
                        <select name="post" class="form-control">
                            <option disabled > Select Post</option>
                            <?php
                            $sql_category_list = "SELECT * from post";
                            $result_sql_category_list = mysqli_query($conn, $sql_category_list) or die("Query Die!! --> sql_category_list");
                            if (mysqli_num_rows($result_sql_category_list) > 0) {
                                while ($row_cate = mysqli_fetch_assoc($result_sql_category_list)) {

                            ?>
                            <option value="<?php echo ($row_cate['post_id']) ?>"><?php echo ($row_cate['title']) ?>
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
