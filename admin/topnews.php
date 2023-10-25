<?php include "header.php";
if ($_SESSION['user_role'] == 0) {
    echo ("<script>window.location.href='$hostname/admin/'</script>");
    
}
?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">Top News</h1>
            </div>
            <!-- <div class="col-md-2">
                <a class="add-new" href="add-user.php">add user</a>
            </div> -->
            <div class="col-md-12" style="overflow: scroll;">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Author</th>
                        <th>Update</th>
                        
                    </thead>
                    <tbody>
                        <!-- PHP CODE -->
                        
                        
                        <?php
                        
                        if (isset($_GET['page_num_index'])) {
                            $page_num_index_by_addbar = $_GET['page_num_index'];
                        } else {
                            $page_num_index_by_addbar = 1;
                        }
                        $serial_num = 1;
                        $sql_show_user = "SELECT *  FROM top_post
                        LEFT JOIN post ON top_post.tp_id = post.post_id
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN user ON post.author = user.user_id
                        ORDER BY top_post.t_id ";
                        $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                        if (mysqli_num_rows($result_sql_show_user) > 0) {
                            while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                        ?>
                                <tr>
                                    <td class='id'>
                                        <?php echo  ($row['t_id'])  ?>
                                        
                                    </td>
                                    <td>
                                        <?php echo ($row['title']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['category_name']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['post_date']) ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['first_name'] . ' ' . $row['last_name']) ?>
                                    </td>
                                    <td class='edit'><a href='update_topnews.php?t_id=<?php echo ($row['t_id']) ?>'><i class='fa fa-edit'></i></a></td>
                                   
                                </tr>
                        <?php $serial_num++;
                            }
                        } ?>
                        <!-- PHP CODE -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>