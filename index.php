<?php
// File ini adalah index.php
require 'db.php'; // Sertakan file koneksi database

// Example variables for dynamic content
$title = "Web Programming - Final Semester Exam";
$categories = [
    "Technology posts" => "technology.php",
    "Lifestyle posts" => "lifestyle.php"
];
$author = "Johnson Smith";

// Ambil data posts dari database
// Ambil data posts dari database
// Ambil data posts dari database
$posts = [];
try {
    // Pastikan kolom yang diambil sesuai dengan yang ada di database
    $stmt = $pdo->query("SELECT title, content, category, author, image_url, publish_date, read_time FROM posts");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $posts[] = $row;
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?php echo $title; ?></title>

    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style-starter.css">
</head>
<body>

<header class="w3l-header">
    <nav class="navbar navbar-expand-lg navbar-light fill px-lg-0 py-0 px-3">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <span class="fa fa-pencil-square-o"></span> Design Blog</a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="fa icon-expand fa-bars"></span>
                <span class="fa icon-close fa-times"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories <span class="fa fa-angle-down"></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($categories as $category => $link): ?>
                                <a class="dropdown-item" href="<?php echo $link; ?>"><?php echo $category; ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                </ul>

                <div class="search-right mt-lg-0 mt-2">
                    <a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
                    <div id="search" class="pop-overlay">
                        <div class="popup">
                            <h3 class="hny-title two">Search here</h3>
                            <form action="search.php" method="GET" class="search-box">
                                <input type="search" placeholder="Search for blog posts" name="search" required autofocus>
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

<nav id="breadcrumbs" class="breadcrumbs">
    <div class="container page-wrapper">
        <a href="index.php">Home</a> / Categories / <span class="breadcrumb_last" aria-current="page">Technology</span>
    </div>
</nav>

<div class="w3l-searchblock w3l-homeblock1 py-5">
    <div class="container py-lg-4 py-md-3">
        <h3 class="section-title-left">Technology</h3>
        <!-- Example of dynamic content generation for blog posts -->
        <?php foreach ($posts as $post): ?>
    <div class="col-md-12 item">
        <div class="card">
            <div class="card-header p-0 position-relative">
                <a href="#blog-single">
                    <img class="card-img-bottom d-block radius-image" src="<?php echo $post['image_url']; ?>" alt="Post image">
                </a>
            </div>
            <div class="card-body p-0 blog-details">
                <a href="#blog-single" class="blog-desc"><?php echo $post['title']; ?></a>
                <p><?php echo $post['content']; ?></p>
                <div class="author align-items-center mt-3 mb-1">
                    <a href="#author"><?php echo $post['author']; ?></a> in <a href="#url"><?php echo $post['category']; ?></a>
                </div>
                <ul class="blog-meta">
                    <li class="meta-item blog-lesson"><span class="meta-value"><?php echo $post['publish_date']; ?></span></li>
                    <li class="meta-item blog-students"><span class="meta-value"><?php echo $post['read_time']; ?> min read</span></li>
                </ul>
            </div>
        </div>
    </div>
<?php endforeach; ?>

    </div>
</div>

<!-- Footer -->
<footer class="w3l-footer-16">
  <div class="footer-content py-lg-5 py-4 text-center">
    <div class="container">
      <div class="copy-right">
        <h6>© <?php echo date("Y"); ?> Design Blog. Made with <span class="fa fa-heart"></span>, Designed by <a href="https://w3layouts.com">W3layouts</a></h6>
      </div>
    </div>
  </div>
</footer>

<script src="assets/js/theme-change.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>
