<?php include 'db_connect.php'; ?>
<div class="container pt-lg-5 pt-md-4">
    <div class="row">
        <div class="col-lg-9 most-recent">
            <h3 class="section-title-left">Most Recent Posts</h3>
            <div class="list-view">
                <?php
                $stmt = $pdo->query("SELECT * FROM posts ORDER BY publish_date DESC LIMIT 5");
                while ($post = $stmt->fetch()) {
                    echo "<div class='grids5-info img-block-mobile mt-5'>";
                    echo "<div class='blog-info align-self'>";
                    echo "<span class='category'>{$post['category']}</span>";
                    echo "<a href='#' class='blog-desc mt-0'>{$post['title']}</a>";
                    echo "<p>" . substr($post['content'], 0, 150) . "...</p>";
                    echo "<div class='author align-items-center mt-3 mb-1'><a href='#'>{$post['author']}</a></div>";
                    echo "<ul class='blog-meta'><li class='meta-item blog-lesson'><span class='meta-value'>{$post['publish_date']}</span></li>";
                    echo "<li class='meta-item blog-students'><span class='meta-value'>{$post['read_time']} min read</span></li></ul>";
                    echo "</div>";
                    echo "<a href='#' class='d-block zoom mt-md-0 mt-3'><img src='{$post['image_url']}' alt='' class='img-fluid radius-image news-image'></a>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
