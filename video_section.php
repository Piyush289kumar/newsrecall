<!-- Video section -->
<div class="row">
                    <div class="col-md-12 my-3">

                        <?php
                        include('admin/config.php');
                        $sql_show_user = "SELECT * FROM video_tb
                                  LEFT JOIN post ON post.post_id = video_tb.v_post_vlink";
                        $result_sql_show_user = mysqli_query($conn, $sql_show_user) or die("Query Failed!!");
                        if (mysqli_num_rows($result_sql_show_user) > 0) {

                            while ($row = mysqli_fetch_assoc($result_sql_show_user)) {
                        ?>
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/<?php echo $row['vlink']?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <?php
                            }
                        }

                        ?>


                    </div>
                </div>
                <!-- Video section -->