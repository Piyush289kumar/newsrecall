    <?php
    include("config.php");
    $user_id_getaddbar = $_GET['id'];

    $sql_delete_user = "DELETE FROM user WHERE user_id='{$user_id_getaddbar}'";

    if (mysqli_query($conn, $sql_delete_user)) {
        echo ("<script>window.location.href='$hostname/admin/users.php'</script>");
        
    } else {
        echo ("<p style='color:red; margin:10px 0;'>Can't Delete the User Record.");
    }
    mysqli_close($conn);

    ?>