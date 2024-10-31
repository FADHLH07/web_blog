<?php
// File ini adalah index.php
require 'db.php'; // Sertakan file koneksi database

// Ambil data kategori dari database (asumsi Anda memiliki tabel kategori)
$categories = [
    'Technology' => 'technology.php',
    'Lifestyle' => 'lifestyle.php', // Menambahkan kategori Lifestyle
    // Tambahkan kategori lainnya sesuai kebutuhan
];

// Ambil data posts dari database untuk Most Recent Posts
try {
    $stmt = $pdo->query("SELECT title, content, category, author, publish_date AS created_at FROM posts ORDER BY publish_date DESC LIMIT 5");
    $recentPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $recentPosts = []; // Inisialisasi dengan array kosong jika terjadi kesalahan
    echo "Error fetching recent posts: " . $e->getMessage();
}

// Ambil data trending posts berdasarkan jumlah baca
try {
    $stmt = $pdo->query("SELECT title, content, category, author, publish_date AS created_at, view_count FROM posts ORDER BY view_count DESC LIMIT 5");
    $trendingPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $trendingPosts = []; // Inisialisasi dengan array kosong jika terjadi kesalahan
    echo "Error fetching trending posts: " . $e->getMessage();
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Web Programming Blog</title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>

<body>
    <!-- header -->
    <header class="w3l-header">
        <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                    <span class="fa fa-pencil-square-o"></span> Web Programming Blog</a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="fa icon-expand fa-bars"></span>
                    <span class="fa icon-close fa-times"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item dropdown @@category__active">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Categories <span class="fa fa-angle-down"></span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <?php foreach ($categories as $category => $link): ?>
                                    <a class="dropdown-item" href="<?php echo htmlspecialchars($link); ?>"><?php echo htmlspecialchars($category); ?></a>
                                <?php endforeach; ?>
                            </div>
                        </li>
                        <li class="nav-item @@contact__active">
                            <a class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item @@about__active">
                            <a class="nav-link" href="about.html">About</a>
                        </li>
                    </ul>

                    <div class="search-right mt-lg-0 mt-2">
                        <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                        <div id="search" class="pop-overlay">
                            <div class="popup">
                                <h3 class="hny-title two">Search here</h3>
                                <form action="#" method="GET" class="search-box">
                                    <input type="search" placeholder="Search for blog posts" name="search" required="required" autofocus="">
                                    <button type="submit" class="btn">Search</button>
                                </form>
                                <a class="close" href="#close">×</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- //header -->

    <div class="w3l-homeblock1">
        <div class="container pt-lg-5 pt-md-4">
            <div class="row">
                <div class="col-lg-9 most-recent">
                    <h3 class="section-title-left">Most Recent Posts</h3>
                    <div class="list-view">
                        <?php if (!empty($recentPosts)): ?>
                            <?php foreach ($recentPosts as $post): ?>
                                <div class="grids5-info img-block-mobile mt-5">
                                    <div class="blog-info align-self">
                                        <span class="category"><?php echo htmlspecialchars($post['category']); ?></span>
                                        <a href="#blog-single" class="blog-desc mt-0"><?php echo htmlspecialchars($post['title']); ?></a>
                                        <p><?php echo htmlspecialchars($post['content']); ?></p>
                                        <div class="author align-items-center mt-3 mb-1">
                                            <a href="#author"><?php echo htmlspecialchars($post['author']); ?></a> in <a href="#url"><?php echo htmlspecialchars($post['category']); ?></a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li class="meta-item blog-lesson">
                                                <span class="meta-value"><?php echo date("F j, Y", strtotime($post['created_at'])); ?></span>
                                            </li>
                                            <li class="meta-item blog-students">
                                                <span class="meta-value">6 reads</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <a href="#blog-single" class="d-block zoom mt-md-0 mt-3"><img src="assets/images/default.jpg"
                                            alt="" class="img-fluid radius-image news-image"></a>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No recent posts available.</p>
                        <?php endif; ?>
                    </div>

                    <!-- pagination -->
                    <div class="pagination-wrapper mt-5">
                        <ul class="page-pagination">
                            <li><a class="next" href="#url"><span class="fa fa-angle-left"></span></a></li>
                            <li><span aria-current="page" class="page-numbers current">1</span></li>
                            <li><a class="page-numbers" href="#url">2</a></li>
                            <li><a class="page-numbers" href="#url">3</a></li>
                            <li><a class="page-numbers" href="#url">....</a></li>
                            <li><a class="page-numbers" href="#url">10</a></li>
                            <li><a class="next" href="#url"><span class="fa fa-angle-right"></span></a></li>
                        </ul>
                    </div>
                    <!-- //pagination -->
                </div>

                <div class="col-lg-3 trending mt-lg-0 mt-5 mb-lg-5">
                    <div class="pos-sticky">
                        <h3 class="section-title-left">Trending</h3>
                        <?php if (!empty($trendingPosts)): ?>
                            <?php foreach ($trendingPosts as $index => $post): ?>
                                <div class="grids5-info">
                                    <h4><?php echo str_pad($index + 1, 2, '0', STR_PAD_LEFT) . '.'; ?></h4>
                                    <div class="blog-info">
                                        <a href="#blog-single" class="blog-desc1"><?php echo htmlspecialchars($post['title']); ?></a>
                                        <div class="author align-items-center mt-2 mb-1">
                                            <a href="#author"><?php echo htmlspecialchars($post['author']); ?></a> in <a href="#url"><?php echo htmlspecialchars($post['category']); ?></a>
                                        </div>
                                        <ul class="blog-meta">
                                            <li class="meta-item blog-lesson">
                                                <span class="meta-value"><?php echo date("F j, Y", strtotime($post['created_at'])); ?></span>
                                            </li>
                                            <li class="meta-item blog-students">
                                                <span class="meta-value"><?php echo htmlspecialchars($post['view_count']); ?> reads</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <p>No trending posts available.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <!-- //block -->

            <!-- ad block -->
            <!-- <div class="ad-block text-center mt-5">
                <a href="#url"><img src="assets/images/ad.gif" class="img-fluid" alt="ad image" /></a>
            </div> -->
            <!-- //ad block -->

        </div>
    </div>
    <!-- footer -->
    <footer class="w3l-footer-16">
        <div class="footer-content py-lg-5 py-4 text-center">
            <div class="container">
                <div class="copy-right">
                    <h6>© 2024 Web Programming Blog. Made by <i>(your name)</i> with <span class="fa fa-heart" aria-hidden="true"></span><br>Designed by
                        <a href="https://w3layouts.com">W3layouts</a></h6>
                </div>
                <ul class="author-icons mt-4">
                    <li><a class="facebook" href="#url"><span class="fa fa-facebook" aria-hidden="true"></span></a></li>
                    <li><a class="twitter" href="#url"><span class="fa fa-twitter" aria-hidden="true"></span></a></li>
                    <li><a class="google" href="#url"><span class="fa fa-google-plus" aria-hidden="true"></span></a></li>
                    <li><a class="linkedin" href="#url"><span class="fa fa-linkedin" aria-hidden="true"></span></a></li>
                    <li><a class="github" href="#url"><span class="fa fa-github" aria-hidden="true"></span></a></li>
                    <li><a class="dribbble" href="#url"><span class="fa fa-dribbble" aria-hidden="true"></span></a></li>
                </ul>
                <button onclick="topFunction()" id="movetop" title="Go to top">
                    <span class="fa fa-angle-up"></span>
                </button>
            </div>
        </div>

        <!-- move top -->
        <script>
            window.onscroll = function () {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- //move top -->
    </footer>
    <!-- //footer -->

    <!-- Template JavaScript -->
    <script src="assets/js/theme-change.js"></script>
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function () {
            $('.navbar-toggler').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <script src="assets/js/bootstrap.min.js"></script>

</body>

</html>
