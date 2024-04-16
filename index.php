// Auteurs: Morad BEZZAZI && Yasser GUERRAM
// Version :V0
// date de fin de projet : 16/04/2024
// Encadré par M ADELL

<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php include("includes/public/registration_login.php"); ?>
<?php include("includes/all_functions.php"); ?>
<title>MyWebSite | Home </title>

</head>

<body>
	
	<div class="container">

		<!-- Navbar -->
		<?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
		<!-- // Navbar -->

		<!-- Banner -->
		<?php include(ROOT_PATH . '/includes/public/banner.php'); ?>
		<!-- // Banner -->

		<!-- Messages -->
		
		<!-- // Messages -->

		<!-- content -->
		<div class="content">
			<h2 class="content-title">Recent Articles</h2>
			<hr>
			<?php
				$publishedPosts = getPublishedPosts();
				
				// Afficher les articles récupérés (c'est ici que vous pourriez personnaliser l'affichage)
				if ($publishedPosts) {
					foreach ($publishedPosts as $post) {
						echo '<div class="post" style="margin-left: 0px; position:relative;">';
							foreach ($post['topics'] as $topic) {
								echo "<div style='position:absolute; background :white; left:3px; top:3px;padding:2px 10px;'>";
								echo $topic['name'];
								echo "</div>";
							}
							echo '<img class="post_image"  src="static/images/' . $post['image'] . '" alt="Post Image" width="300"><br>';
							echo "<h5> " . $post['title'] . "</h5>";
							echo "<span style='color:gray;'>" .$post['created_at'] . "</span>";
							echo ('<a style="color: gray;" href="single_post.php?post-slug='. $post["slug"].'">read more...</a>');
						echo '</div>';
					}
				} else {
					echo "Aucun article publié.";
				}
			?>
			



		</div>
		<!-- // content -->


	</div>
	<!-- // container -->
	<!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->
