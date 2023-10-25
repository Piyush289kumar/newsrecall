<?php
include("config.php");
session_start();

if (!isset($_SESSION['username'])) {
    echo ("<script>window.location.href='$hostname/admin/'</script>");
}


$current_page = basename($_SERVER['PHP_SELF']);
$prefix_word = "ADMIN Panel";
switch ($current_page) {
    case 'add-category.php':
        $page_title = "{$prefix_word} - Category Add";
        break;
    case 'add-post.php':
        $page_title = "{$prefix_word} - Post Add";
        break;
    case 'add-user.php':
        $page_title = "{$prefix_word} - User Add";
        break;
    case 'category.php':
        $page_title = "{$prefix_word} - Category";
        break;
    case 'post.php':
        $page_title = "{$prefix_word} - Post";
        break;
    case 'settings.php':
        $page_title = "{$prefix_word} - Settings";
        break;
    case 'update-category.php':
        $page_title = "{$prefix_word} - Category Update";
        break;
    case 'update-post.php':
        $page_title = "{$prefix_word} - Post Update";
        break;
    case 'update-user.php':
        $page_title = "{$prefix_word} - User Update";
        break;
    case 'users.php':
        $page_title = "{$prefix_word} - Users";
        break;
    default:
        $page_title = $website_display_default_name;
        break;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="title" content="The News Recall - Jabalpur News and Many more">
    <meta name="description" content="News Recall is a registered newspaper by the Government of India. This website has been created for its digitization. We provide information about events.">
    <meta name="keywords" content="news recall online, news recall, recall news, news, jabalpur news, mp news, jabalpur, mp, newsrecall india, india, news india, recall news india, e-paper news recall, news recall e paper">
    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Hindi">
    <meta name="revisit-after" content="1 day">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" type="x-con" href="../images/logo_.png">
    <title><?php echo ($page_title); ?></title>
      <!-- Facebook Meta Tags -->
  <meta property="og:url" content="https://www.newsrecall.in">
  <meta property="og:type" content="website">
  <meta property="og:title" content="न्यूज़ रिकॉल">
  <meta property="og:description" content="न्यूज़ रिकॉल भारत सरकार द्वारा पंजीकृत समाचार पत्र है। इसके डिजिटलाइजेशन के लिए यह वेबसाइट बनाई गई है। इसके विषय वस्तु नियमानुसार न्यूज़ रिकॉल की संपत्ति हैं इसको उपयोग अथवा दुरुपयोग करने पर नियमानुसार वैधानिक कार्यवाही की जाएगी।">
  <meta property="og:image" content="https://www.newsrecall.in/slink.png">

  <!-- Twitter Meta Tags -->
  <meta name="twitter:card" content="summary_large_image">
  <meta property="twitter:domain" content="newsrecall.in">
  <meta property="twitter:url" content="https://www.newsrecall.in">
  <meta name="twitter:title" content="न्यूज़ रिकॉल">
  <meta name="twitter:description" content="न्यूज़ रिकॉल भारत सरकार द्वारा पंजीकृत समाचार पत्र है। इसके डिजिटलाइजेशन के लिए यह वेबसाइट बनाई गई है। इसके विषय वस्तु नियमानुसार न्यूज़ रिकॉल की संपत्ति हैं इसको उपयोग अथवा दुरुपयोग करने पर नियमानुसार वैधानिक कार्यवाही की जाएगी।">
  <meta name="twitter:image" content="https://www.newsrecall.in/slink.png">
  
   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="../css/bootstrapu.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="../css/adminstyle_.css">
    <link rel="shortcut icon" type="x-con" href="../images/logo_.png">
</head>

<body>
    <!-- HEADER -->
    <div id="header-admin">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">

                    <?php
                    include("config.php");
                    $sql_setting_record = "SELECT * FROM settings";
                    $result_sql_setting_record = mysqli_query($conn, $sql_setting_record) or die("Query Die !! --> sql_setting_record");
                    if (mysqli_num_rows($result_sql_setting_record) > 0) {
                        while ($row_setting_record = mysqli_fetch_assoc($result_sql_setting_record)) {
                            if ($row_setting_record['logo'] == "") {
                                echo '<a href="index.php"><h1>' . $row_setting_record['websitename'] . '</h1></a>';
                            } else {
                                echo ('<a href="index.php" id="logo"><img src="../images/H-Logo.png" alt="unlink"></a>');
                            }
                        }
                    }
                    ?>
                </div>
                <!-- /LOGO -->
                <!-- LOGO-Out -->
                <div class="col-md-offset-6  col-md-3">
                    <a href="<?php echo $hostname; ?>" class="admin-logout">Hello <?php echo $_SESSION['username']; ?>, back</a>
                </div>
                <!-- /LOGO-Out -->
            </div>
        </div>
    </div>
    <!-- /HEADER -->
    <!-- Menu Bar -->
    <div id="admin-menubar">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="admin-menu">
                        <li>
                            <a href="post.php">Master News</a>
                        </li>
                        <?php
                        if ($_SESSION['user_role'] == 1) {
                        ?>
                            <li>
                                <a href="news_paper.php">ई-समाचार</a>
                            </li>
                            <li>
                                <a href="vlink_three.php">प्रमुख समाचार</a>
                            </li>

                            <li>
                                <a href="vlink_sec.php">स्टोरी न्यूज़</a>
                            </li>


                            <li>
                                <a href="topnews.php">Top 10</a>
                            </li>



                            <!-- <li>
                                <a href="ads.php">प्रचार न्यूज</a>
                            </li> -->
                            <!-- <li>
                            <a href="category.php">Category</a>
                        </li> -->
                            <li>
                                <a href="users.php">Users</a>
                            </li>

                            <!-- <li>
                            <a href="settings.php">Settings</a>
                        </li> -->

                        <?php
                        } ?>
                            
                            <li>
                            <a href="logout.php">Log out</a>
                        </li>
                            
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- /Menu Bar -->