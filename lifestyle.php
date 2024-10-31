<?php
// Start of PHP file
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Web Programming - Final Semester Exam</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Cabin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800&display=swap" rel="stylesheet">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style-starter.css">
  </head>
  <body>
<!-- header -->
<header class="w3l-header">
	<!--/nav-->
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
					<li class="nav-item @@home__active">
						<a class="nav-link" href="index.php">Home</a>
					</li>
					<li class="nav-item dropdown active">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Categories <span class="fa fa-angle-down"></span>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<a class="dropdown-item @@cp__active" href="technology.php">Technology posts</a>
							<a class="dropdown-item active" href="lifestyle.php">Lifestyle posts</a>
						</div>
					</li>
					<li class="nav-item @@contact__active">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>
                    <li class="nav-item @@about__active">
                        <a class="nav-link" href="about.php">About</a>
                    </li>
				</ul>

				<!--/search-right-->
				<div class="search-right mt-lg-0 mt-2">
					<a href="#search" title="search"><span class="fa fa-search" aria-hidden="true"></span></a>
					<div id="search" class="pop-overlay">
						<div class="popup">
							<h3 class="hny-title two">Search here</h3>
							<form action="#" method="get" class="search-box">
								<input type="search" placeholder="Search for blog posts" name="search"
									required="required" autofocus="">
								<button type="submit" class="btn">Search</button>
							</form>
							<a class="close" href="#close">×</a>
						</div>
					</div>
				</div>
			</div>

            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
		</div>
	</nav>
</header>

<nav id="breadcrumbs" class="breadcrumbs">
	<div class="container page-wrapper">
		<a href="index.php">Home</a> / Categories / <span class="breadcrumb_last" aria-current="page">Lifestyle</span>
	</div>
</nav>
<div class="w3l-searchblock w3l-homeblock1 py-5">
    <div class="container py-lg-4 py-md-3">
        <!-- block -->
        <div class="row">
            <div class="col-lg-8 most-recent">
                <h3 class="section-title-left">Lifestyle</h3>
               
                <div class="row">
                    <!-- Repeat block for each blog post -->
                    <?php
                    // Sample loop for generating blog posts. Replace with dynamic data if needed.
                    $posts = [
                        ["img" => "assets/images/p2.jpg", "title" => "Here are a few tips that will help you to get started about lifestyle"],
                        ["img" => "assets/images/p1.jpg", "title" => "Before you start writing first blog post, you should make a content plan."]
                        // Add more posts as needed
                    ];

                    foreach ($posts as $post): ?>
                        <div class="col-lg-6 col-md-6 item">
                            <div class="card">
                                <div class="card-header p-0 position-relative">
                                    <a href="#blog-single">
                                        <img class="card-img-bottom d-block radius-image" src="<?php echo $post['img']; ?>" alt="Card image cap">
                                    </a>
                                </div>
                                <div class="card-body p-0 blog-details">
                                    <a href="#blog-single" class="blog-desc"><?php echo $post['title']; ?></a>
                                    <p>Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi vitae sit.</p>
                                    <div class="author align-items-center mt-3 mb-1">
                                        <a href="#author">Johnson smith</a> in <a href="#url">Design</a>
                                    </div>
                                    <ul class="blog-meta">
                                        <li class="meta-item blog-lesson">
                                            <span class="meta-value"> April 13, 2020 </span>
                                        </li>
                                        <li class="meta-item blog-students">
                                            <span class="meta-value"> 6min read</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="pagination-wrapper mt-5">
                    <ul class="page-pagination">
                        <li><span aria-current="page" class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="#url">2</a></li>
                        <li><a class="page-numbers" href="#url">3</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 trending mt-lg-0 mt-5 mb-lg-5">
                <div class="pos-sticky">
                    <h3 class="section-title-left">Trending </h3>
                    <div class="grids5-info">
                        <h4>01.</h4>
                        <div class="blog-info">
                            <a href="#blog-single" class="blog-desc1">Few Ways to Readership and improving your blog</a>
                            <div class="author align-items-center mt-2 mb-1">
                                <a href="#author">Johnson smith</a> in <a href="#url">Design</a>
                            </div>
                            <ul class="blog-meta">
                                <li class="meta-item blog-lesson">
                                    <span class="meta-value"> April 13, 2020 </span>
                                </li>
                                <li class="meta-item blog-students">
                                    <span class="meta-value"> 6min read</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="ad-block text-center mt-5">
            <a href="#url"><img src="assets/images/ad.gif" class="img-fluid" alt="ad image" /></a>
        </div>
    </div>
</div>

<footer class="w3l-footer-16">
  <div class="footer-content py-lg-5 py-4 text-center">
    <div class="container">
      <div class="copy-right">
        <h6>© 2020 Design Blog. Made with <span class="fa fa-heart" aria-hidden="true"></span>, Designed by <a href="https://w3layouts.com">W3layouts</a></h6>
      </div>
    </div>
  </div>
</footer>

<script src="assets/js/theme-change.js"></script>
<script src="assets/js/jquery-3.3.1.min.js"></script>
<script>
  $(function () {
    $('.navbar-toggler').click(function () {
      $('body').toggleClass('noscroll');
    });
  });
</script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// End of PHP file
?>
