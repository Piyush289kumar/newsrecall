<div class="row cardcover">
                    <div class="col-12 my-3">
                        <h4>ताजा खबर</h4>
                    </div>

                    <?php
                    $sql_show_post_record = "SELECT *  FROM post
                        LEFT JOIN category ON post.category = category.category_id
                        LEFT JOIN user ON post.author = user.user_id
                        ORDER BY post.post_id DESC
                        limit 6" or die("Query Failed!! --> sql_show_post_record");

                    $result_sql_show_post_record = mysqli_query($conn, $sql_show_post_record);
                    if (mysqli_num_rows($result_sql_show_post_record) > 0) {
                        while ($row = mysqli_fetch_assoc($result_sql_show_post_record)) {
                    ?>


                            <div class="col-4 my-1"><a href="single.php?post_id=<?php echo ($row['post_id']) ?>"><img class="latest_post_img" src="admin/upload/<?php echo $row['post_img']; ?>" alt="unlink" srcset=""></a></div>
                            <div class="col-8 mb-4">
                                <a href="single.php?post_id=<?php echo ($row['post_id']) ?>">
                                    <p class="m-0 mb-1"><?php echo substr($row['title'], 0, 120) . '....'; ?></p>
                                </a>
                                <p style="font-size: 12px; margin: 0; padding: 0;"><i class="fa-solid fa-user"></i><?php echo ' ' .$row['username']; ?></p>
                                <p style="font-size: 12px; margin: 0; padding: 0;"><i class="fa-solid fa-calendar-days"></i><?php echo ' ' . $row['post_date']; ?></p>

                            </div>

                    <?php }
                    } ?>

                </div>