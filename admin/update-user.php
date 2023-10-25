<?php include "header.php";
if ($_SESSION['user_role'] == 0) {
    echo ("<script>window.location.href='$hostname/admin/'</script>");
    
};
include("config.php");
$user_id_getaddbar = $_GET['id'];
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
            $allow_extension = array("jpg", "jpeg", "png");
            $file_error = array();
    
            if (in_array($file_ext, $allow_extension) === false) {
                $file_error[] =  ("<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, PNG or WEBP file.</div>");
            }
            if ($file_size > 2097152) {
                $file_error[] =("<div class='alert alert-danger'>Image must be 2mb or lower.</div>");
            }
            $save_img_name =  date("d_M_Y_h_i_sa")."_". basename($file_name);
            $img_save_target = "upload/";
            if (empty($file_error) == true) {
                move_uploaded_file($file_tmp, $img_save_target . $save_img_name);
            } else {
                print_r($file_error);
                 ?>
                <div class="col-md-2">
                <a class="add-new btn btn-primary" href="post.php">Back</a>
            </div>
            <?php 
                die();
            }
    
        }
    }
    


    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    $sql_update_user = "UPDATE user SET first_name= '{$fname}', last_name= '{$lname}',username='{$username}', 
    role='{$role}', img = '{$save_img_name}' WHERE user_id='{$user_id_getaddbar}'";

    if (mysqli_query($conn, $sql_update_user)) {
        echo ("<script>window.location.href='$hostname/admin/users.php'</script>");
        
    }

}



?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Modify User Details</h1>
            </div>
            <div class="col-md-offset-4 col-md-4">
                <!-- Form Start -->

                <!-- PHP CODE -->
                <?php include("config.php");
                
                $sql_userdata_show_by_id = "SELECT * FROM user WHERE user_id = {$user_id_getaddbar}";

                $result_sql_userdata_show_by_id = mysqli_query($conn, $sql_userdata_show_by_id) or die("Query Die!!");
                if (mysqli_num_rows($result_sql_userdata_show_by_id) > 0) {
                    while ($row = mysqli_fetch_assoc($result_sql_userdata_show_by_id)) {


                ?>
                
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id'] ?>"
                            placeholder="">
                    </div>
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" value="<?php echo $row['first_name'] ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" value="<?php echo $row['last_name'] ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="username" class="form-control" value="<?php echo $row['username'] ?>"
                            placeholder="" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role" value="<?php echo $row['role'] ?>">
                        <?php
                            if ($row['role']==1) {
                                echo("<option value='1' selected>Admin</option>
                                <option value='0'>Local</option>");
                        } else {
                            echo("<option value='1'>Admin</option>
                                <option value='0' selected>Local</option>");
                        }
                        ?>    
                    </select>
                    
                    </div>
                    <div class="form-group">
                        <label for="">Profile picture</label>
                        <input type="file" name="new-image">

                        <img src="upload/<?php echo $row['img']; ?>" height="150px" style="border-radius: 50%; margin-top:12px;">

                        <input type="hidden" name="old-image" value="<?php echo $row['img']; ?>"> 
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