<?php include 'db_connect.php'; ?>

<?php
// Ambil kategori dari parameter URL
$category = isset($_GET['cat']) ? $_GET['cat'] : 'Technology'; // Default ke Technology jika tidak ada parameter
?>

<div class="container pt-lg-5 pt-md-4">
    <div class="row">
        <div class="col-lg-9 most-recent">
            <h3 class="section-title-left"><?php echo $category; ?> Posts</h3>
            <div class="list-view">
                <?php
                // Ambil 5 artikel terbaru dari kategori tertentu
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE category = ? ORDER BY publish_date DESC LIMIT 5");
                $stmt->execute([$category]);
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
        <div class="col-lg-3 trending">
            <h3 class="section-title-left">Trending</h3>
            <div class="trending-posts">
                <?php
                // Ambil 5 artikel teratas berdasarkan jumlah pembaca untuk kategori tertentu
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE category = ? ORDER BY view_count DESC LIMIT 5");
                $stmt->execute([$category]);
                while ($trending = $stmt->fetch()) {
                    echo "<div class='trending-item'>";
                    echo "<span class='category'>{$trending['category']}</span>";
                    echo "<a href='#' class='trending-title'>{$trending['title']}</a>";
                    echo "<div class='meta'><span class='date'>{$trending['publish_date']}</span></div>";
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </div>
</div>
