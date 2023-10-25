<?php 
include("config.php");
$category_index_by_addbar = $_GET['category_index'];

$sql_category_delete = "DELETE FROM category WHERE category_id = {$category_index_by_addbar}" or die("Query Failed!! --> sql_category_delete");
if (mysqli_query($conn,$sql_category_delete)) {
    echo ("<script>window.location.href='$hostname/admin/category.php'</script>");
}
mysqli_close($conn);
?>