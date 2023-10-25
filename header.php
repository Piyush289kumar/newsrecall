<!DOCTYPE html>
<html lang="en">

<head>
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
    }else{
    $page_index_by_addbar = $_GET['post_id'];
    }
    if ($page_index_by_addbar == 1) {?>
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
    <meta name="og:description" content="न्यूज़ रिकॉल भारत सरकार द्वारा पंजीकृत समाचार पत्र है। इसके डिजिटलाइजेशन के लिए यह वेबसाइट बनाई गई है। इसके विषय वस्तु नियमानुसार न्यूज़ रिकॉल की संपत्ति हैं इसको उपयोग अथवा दुरुपयोग करने पर नियमानुसार वैधानिक कार्यवाही की जाएगी।">
    <meta name="og:image" content="https://www.newsrecall.in/slink.png">
    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="Home - न्यूज़ रिकॉल">
    <meta property="twitter:site" content="@newsrecalls">
    <meta property="twitter:creator" content="@newsrecalls">
    <meta property="twitter:domain" content="https://www.newsrecall.in">
    <meta property="twitter:url" content="https://www.newsrecall.in">
    <meta name="twitter:description" content="न्यूज़ रिकॉल भारत सरकार द्वारा पंजीकृत समाचार पत्र है। इसके डिजिटलाइजेशन के लिए यह वेबसाइट बनाई गई है। इसके विषय वस्तु नियमानुसार न्यूज़ रिकॉल की संपत्ति हैं इसको उपयोग अथवा दुरुपयोग करने पर नियमानुसार वैधानिक कार्यवाही की जाएगी।">
    <meta name="twitter:image" content="https://www.newsrecall.in/slink.png">
    <?php
    
    } else {
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
                <meta name="og:description" content="<?php echo substr($row['description'], 0, 160) . '....' ?>">
                <meta name="og:image" content="<?php echo $hostname?>/admin/upload/<?php echo $row['post_img']; ?>">
                <!-- Twitter Meta Tags -->
                <meta property="twitter:title" content="<?php echo $row['title']; ?> - न्यूज़ रिकॉल">
                <meta property="twitter:url" content="https://www.newsrecall.in/single.php?post_id=<?php $row['post_id'] ?>">
                <meta name="twitter:description" content="<?php echo substr($row['description'], 0, 160) . '....' ?>">
                <meta name="twitter:image" content="<?php echo $hostname?>/admin/upload/<?php echo $row['post_img']; ?>">
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
    <?php } ?>


    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- x-icon -->
    <link rel="shortcut icon" type="x-con" href="images/logo_.png">
    <!-- Bootstrap -->
    <!-- <link rel="stylesheet" href="extra file/bootstrap-5.3.0-dist/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="css/newsrecallMainNew.css">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Raleway:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://kit.fontawesome.com/dbed6b6114.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include("admin/config.php");  ?>
    <!-- Preloader
<div class="loader_bg">
        <div class="loader">
            <img src="images/logo.png" alt="">
        </div>
    </div>
  Preloader -->
    <!-- header -->
    <header>
        <!-- Website Logo and Name -->
        <div class="row flex align-items-center logo">
            <div class="col-5 py-1">
                <div>
                    <a href="#" class="px-4"><img src="images\newlogo3.png" alt="newsrecall" style="width: 50%; border-radius:24px;" class="h-logo"></a>
                </div>
            </div>
            <div class="col-5 profilecover">
                    <button class="login_btn mx-4"><a href="admin\index.php">C-Panel</a></button>
             
                <!-- DropDown -->
            </div>
        </div>
        <!-- Website Logo and Name -->
        <div class="navigation-container">
            <div class="top-head">
                <div class="web-name">
                    <!-- <h2>News site</h2> -->
                    <!-- <a href="#"><img src="images/icon-slack.png" alt="News"></a> -->
                    <!-- <a href="<php echo $hostname?>"><img src="images/logo.png" alt="News"></a> -->
                </div>
                <div class="ham-btn">
                    <span>
                        <i class="fas fa-bars"></i>
                    </span>
                </div>
                <div class="times-btn">
                    <span>
                        <i class="fas fa-times"></i>
                    </span>
                </div>
            </div>
            <!-- nav bar -->
            <div class="nav-bar" id="nav-bar">
                <nav>
                    <ul>
                        <!-- English Header -->
                        <!-- <li><a href="<php echo $hostname ?>">Home</a></li>
                    <li><a href="category.php?cate_id=61">E-Paper</a></li>
                    <li><a href="category.php?cate_id=62">Health News</a></li>
                    <li><a href="category.php?cate_id=63">Madical update</a></li>
                    <li><a href="category.php?cate_id=65">Jabalpur</a></li>
                    <li><a href="category.php?cate_id=64">M.P.</a></li> -->
                        <!-- Hindi Header -->
                        <li><a href="<?php echo $hostname ?>">• होम</a></li>
                        <li><a href="news-paper.php">• ई-समाचार</a></li>
                        
                        <!-- Content Save for later 
                    <li><a href="#">Home</a></li>
                        <li><a href="#">Live/Print News</a></li>
                        <li><a href="#">Health update</a></li>
                        <li><a href="#">Madical update</a></li>
                        <li><a href="#">other..</a></li>
                     Content Save for later -->
                        <!--  <li>
                           DropDown 
                            <div class="dropdown ">
                                <span>Dr. Suneel Mish &dtrif;</span>
                                <div class="dropdown-content">
                                    <a href="#">
                                        <p>Mahakoshal Fundation</p>
                                    </a>
                                    <a href="#">
                                        <p>Global Ayush Medical Assosication</p>
                                    </a>
                                </div>
                            </div>
                            DropDown 
                        </li>-->
                        <li>
                            <form class="search-post" action="search.php" method="GET">
                                <div class="input-group input_cover ">
                                    <input type="search" name="search" class="form-control search_btn py-2 m-0 " placeholder="Search..." aria-label="Search" aria-describedby="search-addon" />
                                    <button type="submit" class="btn search_btn_icon"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </li>
                        <!-- <li><a href="#">Global Ayush Medical ass.</a></li> -->
                    </ul>
                </nav>
            </div>
            <!--social icons -->
            <!-- <div class="social-icons">
            <ul>
                <li>
                    <a href="https://www.facebook.com/profile.php?id=100093905613990"><i class="fab fa-facebook"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </li>
                <li>
                    <a href="https://www.youtube.com/channel/UC9MKJnhtbLiRxZzYNFMrEDw"><i class="fab fa-youtube"></i></a>
                </li>
            </ul>
        </div> -->
        </div>
        <!-- Contact us -->
        <div class="col-12 contact-us-col-12">
            <div class="contact-us-links">
                <ul class="contact-us-links-li">
                    <li>
                        <a href="https://www.youtube.com/channel/UC9MKJnhtbLiRxZzYNFMrEDw"><i class="fab fa-youtube"></i>youtube.com/newsrecall</a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=100093905613990"><i class="fab fa-facebook"></i>facebook.com/newsrecall</a>
                    </li>
                    <li>
                        <a href="https://twitter.com/newsrecalls?t=9TryysV0ViyVXyX6KPFrMA&s=08"><i class="fab fa-twitter"></i>twitter.com/newsrecall</a>
                    </li>
                    <li>
                        <a href="#"><i class="fab fa-whatsapp px-0 mx-0"></i><i class="fa-brands fa-telegram"></i>+91 8989812233</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-12 contact-us-col-12-small" style="color:red">
            <div class="contact-us-links" id="social_icon_for_mobile">
                <ul class="contact-us-links-li">
                    <!-- <li><a href="<php echo $hostname ?>">• होम</a></li> -->
                    <!-- <li><a href="news-paper.php">• ई-समाचार</a></li> -->
                    <a href="index.php"><i class="fa-solid fa-house" style="color:#000;"></i></a>
                    <a href="https://www.youtube.com/channel/UC9MKJnhtbLiRxZzYNFMrEDw"><li class="fab fa-youtube"></li></a>
                    <a href="https://api.whatsapp.com/send?phone=918989812233"><li class="fa-brands fa-whatsapp"></li></a>
                    <a href="https://www.facebook.com/profile.php?id=100093905613990"><li class="fab fa-facebook-f"></li></a>
                    <a href="https://twitter.com/newsrecalls?t=9TryysV0ViyVXyX6KPFrMA&s=08"><li class="fab fa-twitter"></li></a>


                    
                </ul>
            </div>
        </div>
        <!-- Contact us -->
    </header>