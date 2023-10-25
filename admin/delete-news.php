    <?php
    include("config.php");
    $user_id_getaddbar = $_GET['post_id'];

    $sql_delete_user = "DELETE FROM news_paper WHERE news_id='{$user_id_getaddbar}'";

    if (mysqli_query($conn, $sql_delete_user)) {
        echo ("<script>window.location.href='$hostname/admin/news_paper.php'</script>");
        
    } else {
        echo ("<p style='color:red; margin:10px 0;'>Can't Delete the News Paper Record.");
    }
    mysqli_close($conn);

    ?>