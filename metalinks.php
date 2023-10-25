<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="keywords" content="news recall online, news recall, recall news, news, jabalpur news, mp news, jabalpur, mp, newsrecall india, india, news india, recall news india, e-paper news recall, news recall e paper">
<meta name="robots" content="index,follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="Hindi">
<meta name="revisit-after" content="1 day">
<meta property="og:locale" content="en_US">
<meta property="og:type" content="website">
<?php
include("config.php");
if (!isset($_GET['post_id'])) {
    $page_index_by_addbar = 1;
} else {
    $page_index_by_addbar = $_GET['post_id'];
}
if (!isset($_GET['post_news_id'])) {
    $page_index_by_addbar_news = 1;
} else {
    $page_index_by_addbar_news = $_GET['post_news_id'];
}
if ($page_index_by_addbar <> 1) {
    $sql_show_post_record = "SELECT *  FROM post
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN user ON post.author = user.user_id
                        WHERE post.post_id = {$page_index_by_addbar}" or die("Query Failed!! --> sql_show_post_record");
    $result_sql_show_post_record = mysqli_query($conn, $sql_show_post_record);
    if (mysqli_num_rows($result_sql_show_post_record) > 0) {
        while ($row = mysqli_fetch_assoc($result_sql_show_post_record)) {
?>
            <title><?php echo $row['title']; ?></title>
            <meta name="title" content="<?php echo $row['title']; ?>">
            <meta name="description" content="<?php echo substr($row['description'], 0, 160) . '....' ?>">
            <!-- Facebook tag -->
            <meta property="og:title" content="<?php echo $row['title']; ?> - न्यूज़ रिकॉल">
            <meta property="og:url" content="https://www.newsrecall.in/single.php?post_id=<?php $row['post_id'] ?>">
            <meta property="og:description" content="<?php echo substr($row['description'], 0, 160) . '....' ?>">
            <meta property="og:image" content="<?php echo $hostname ?>/admin/upload/<?php echo $row['post_img']; ?>">
            <!-- Twitter Meta Tags -->
            <meta property="twitter:title" content="<?php echo $row['title']; ?> - न्यूज़ रिकॉल">
            <meta property="twitter:url" content="https://www.newsrecall.in/single.php?post_id=<?php $row['post_id'] ?>">
            <meta name="twitter:description" content="<?php echo substr($row['description'], 0, 160) . '....' ?>">
            <meta name="twitter:image" content="<?php echo $hostname ?>/admin/upload/<?php echo $row['post_img']; ?>">
    <?php }
    } ?>
    <!-- Facebook Meta Tags -->
    <meta name="og:card" content="summary_large_image">
    <meta property="og:site" content="@newsrecalls">
    <meta property="og:creator" content="@newsrecalls">
    <meta property="og:domain" content="https://www.newsrecall.in">
    <meta property="og:site_name" content="https://www.newsrecall.in/">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@newsrecalls">
    <meta property="twitter:creator" content="@newsrecalls">
    <meta property="twitter:domain" content="https://www.newsrecall.in">
    <!-- social meta tag end  -->
    <?php
} elseif ($page_index_by_addbar_news <> 1) {
    $sql_show_post_record = "SELECT *  FROM news_paper
                            LEFT JOIN user ON news_paper.author = user.user_id
                            WHERE news_paper.news_id = {$page_index_by_addbar_news}" or die("Query Failed!! --> sql_show_post_record");
    $result_sql_show_post_record = mysqli_query($conn, $sql_show_post_record);
    if (mysqli_num_rows($result_sql_show_post_record) > 0) {
        while ($row = mysqli_fetch_assoc($result_sql_show_post_record)) {
    ?>
            <title><?php echo $row['title']; ?></title>
            <meta name="title" content="<?php echo $row['title']; ?>">
            <meta name="description" content="<?php echo substr($row['des'], 0, 160) . '....' ?>">
            <!-- Facebook tag -->
            <meta property="og:title" content="<?php echo $row['title']; ?> - न्यूज़ रिकॉल">
            <meta property="og:url" content="https://www.newsrecall.in/news_single.php?post_news_id=<?php $row['news_id'] ?>">
            <meta property="og:description" content="<?php echo substr($row['des'], 0, 160) . '....' ?>">
            <meta property="og:image" content="<?php echo $hostname ?>/admin/upload/<?php echo $row['pdf']; ?>">
            <!-- Twitter Meta Tags -->
            <meta property="twitter:title" content="<?php echo $row['title']; ?> - न्यूज़ रिकॉल">
            <meta property="twitter:url" content="https://www.newsrecall.in/news_single.php?post_news_id=<?php $row['news_id'] ?>">
            <meta name="twitter:description" content="<?php echo substr($row['des'], 0, 160) . '....' ?>">
            <meta name="twitter:image" content="<?php echo $hostname ?>/admin/upload/<?php echo $row['pdf']; ?>">
    <?php }
    } ?>
    <!-- Facebook Meta Tags -->
    <meta name="og:card" content="summary_large_image">
    <meta property="og:site" content="@newsrecalls">
    <meta property="og:creator" content="@newsrecalls">
    <meta property="og:domain" content="https://www.newsrecall.in">
    <meta property="og:site_name" content="https://www.newsrecall.in/">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@newsrecalls">
    <meta property="twitter:creator" content="@newsrecalls">
    <meta property="twitter:domain" content="https://www.newsrecall.in">
    <!-- social meta tag end  -->
<?php
} else { ?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The News Recall - Jabalpur News and Many more</title>
    <meta name="title" content="The News Recall - Jabalpur News and Many more">
    <meta name="description" content="News Recall is a registered newspaper by the Government of India. This website has been created for its digitization. We provide information about events.">
    <meta name="keywords" content="news recall online, news recall, recall news, news, jabalpur news, mp news, jabalpur, mp, newsrecall india, india, news india, recall news india, e-paper news recall, news recall e paper">
    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Hindi">
    <meta name="revisit-after" content="1 day">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Home - न्यूज़ रिकॉल">
    <meta property="og:url" content="https://www.newsrecall.in/">
    <meta property="og:site_name" content="https://www.newsrecall.in/">
    <!-- Facebook Meta Tags -->
    <meta name="og:card" content="summary_large_image">
    <meta property="og:site" content="@newsrecalls">
    <meta property="og:creator" content="@newsrecalls">
    <meta property="og:domain" content="https://www.newsrecall.in">
    <meta property="og:description" content="न्यूज़ रिकॉल भारत सरकार द्वारा पंजीकृत समाचार पत्र है। इसके डिजिटलाइजेशन के लिए यह वेबसाइट बनाई गई है। इसके विषय वस्तु नियमानुसार न्यूज़ रिकॉल की संपत्ति हैं इसको उपयोग अथवा दुरुपयोग करने पर नियमानुसार वैधानिक कार्यवाही की जाएगी।">
    <meta property="og:image" content="https://www.newsrecall.in/slink.png">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Home - न्यूज़ रिकॉल">
    <meta property="twitter:site" content="@newsrecalls">
    <meta property="twitter:creator" content="@newsrecalls">
    <meta property="twitter:domain" content="https://www.newsrecall.in">
    <meta property="twitter:url" content="https://www.newsrecall.in">
    <meta name="twitter:description" content="न्यूज़ रिकॉल भारत सरकार द्वारा पंजीकृत समाचार पत्र है। इसके डिजिटलाइजेशन के लिए यह वेबसाइट बनाई गई है। इसके विषय वस्तु नियमानुसार न्यूज़ रिकॉल की संपत्ति हैं इसको उपयोग अथवा दुरुपयोग करने पर नियमानुसार वैधानिक कार्यवाही की जाएगी।">
    <meta name="twitter:image" content="https://www.newsrecall.in/slink.png">
<?php } ?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- x-icon -->
<link rel="shortcut icon" type="x-con" href="images/logo_.png">
<!-- Bootstrap -->
<!-- <link rel="stylesheet" href="extra file/bootstrap-5.3.0-dist/css/bootstrap.min.css"> -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<link rel="stylesheet" href="css/cu.css">
<!-- google fonts -->
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<!-- fontawesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>


<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-2XWGBW87VL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-2XWGBW87VL');
</script>

<!-- Google adsense -->
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-5204459671949577"
     crossorigin="anonymous"></script>