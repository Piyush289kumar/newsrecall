<section>
        <div class="row m-4">

        <?php
            $sql_show_user = "SELECT * FROM post
                              LEFT JOIN user ON post.author = user.user_id
                              ORDER BY  post.post_id DESC";
            $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
            if (mysqli_num_rows($result_sql_show_user) > 0) {

                while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
            ?>


            <div class="col-md-3 mb-2">
                <div class="card" style="border: 1px solid transparent; border-radius: 12px;">
                    <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                        <a href="single.php?post_id=<?php echo($row['post_id']) ?>">
                        <img src="admin/upload/<?php echo $row['post_img']; ?>"   alt="unlink" class="img-fluid" style="border: 1px solid transparent; border-radius: 12px;" /></a>
                        <a href="#!">
                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                        </a>
                    </div>
                    <div class="card-body">
                   
                        <p class="card-text"><?php echo substr($row['title'],0,120).'...' ?></p>
                        <div class="row">
                            <div class="col-md-12">
                            <div class="col-md-12">
                                <p class="piconcart" style="margin: 4px 4px;"><i class="fa-solid fa-user" style="padding-right: 5px;"></i><?php echo $row['username']; ?></p>
                            </div>
                            
                                <p class="piconcart" style="margin: 4px 4px;"><i class="fa-solid fa-calendar-days" style="padding-right: 5px;"></i><?php echo $row['post_date']; ?></p>
                            </div>
                            
                        </div>
                        <a href="single.php?post_id=<?php echo($row['post_id']) ?>" class="btn btn-primary" style="border: 1px solid transparent; border-radius: 12px; margin-top: 5px;">देखिए</a>
                    </div>                    
                </div>
            </div>

            <?php
                }
            }
            ?>

        </div>
    </section>
    