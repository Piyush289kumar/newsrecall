<?php include "header.php"; ?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add User</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->
                <?php
                if (isset($_POST['save'])) {

                    // Image code
                    if (isset($_FILES['fileToUpload'])) {
                        $file_name = $_FILES['fileToUpload']["name"];
                        $file_tmp = $_FILES['fileToUpload']["tmp_name"];
                        $file_type = $_FILES['fileToUpload']["type"];
                        $file_size = $_FILES['fileToUpload']["size"];
                        $file_ext = strtolower(end(explode('.', $file_name)));
                        $allow_extension = array("jpg", "jpeg", "png");
                        $file_error = array();
                
                        if (in_array($file_ext, $allow_extension) === false) {
                            $file_error[] =("<div class='alert alert-danger'>This extension file not allowed, Please choose a JPG, PNG or WEBP file.</div>");
                        }
                        if ($file_size > 2097152) {
                            $file_error[] =  ("<div class='alert alert-danger'>Image must be 2mb or lower.</div>");
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


                    include("config.php");
                    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
                    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
                    $username = mysqli_real_escape_string($conn, $_POST['user']);
                    $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
                    $role = mysqli_real_escape_string($conn, $_POST['role']);

                    $sql_user_cheack = "SELECT username FROM user WHERE username = '{$username}'";
                    $result_user_cheack = mysqli_query($conn, $sql_user_cheack) or die("Query Die ( sql_user_cheack )!!");
                    if (mysqli_num_rows($result_user_cheack) > 0) {
                        echo ("<p style='font:red;text-align:center'>User already Exsits !!</p>");
                    } else {
                        $sql_insert_user = "INSERT INTO user (first_name, last_name,username,password,role,img)
                    values('{$fname}','{$lname}','{$username}','{$pass}','{$role}','{$save_img_name}')";

                        if (mysqli_query($conn, $sql_insert_user)) {
                            echo ("<script>window.location.href='$hostname/admin/users.php'</script>");
                            
                        }

                    }


                }
                ?>
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST" autocomplete="off"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                    </div>
                    <div class="form-group">
                        <label>User Name</label>
                        <input type="text" name="user" class="form-control" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                        <label>User Role</label>
                        <select class="form-control" name="role">
                            <option value="0">Normal User</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Post image</label>
                        <input type="file" name="fileToUpload" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save" required />
                </form>
                <!-- Form End-->
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>