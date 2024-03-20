<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php include("includes/all_functions.php"); ?>
<title>MyWebSite | Home </title>

</head>

<body>

	<div class="container">

		<!-- Navbar -->
		<?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
		<!-- // Navbar -->
		<!-- content -->
		<div class="content">
			
			<hr>
			<?php
				$publishedPost = getPost($_GET['post-slug']);
				
				if ($publishedPost) {
                    echo'<div class="post_topics">';
                        echo '<div class="single_post" >';
                            echo "<h2>".$publishedPost['title']."</h2>";
                            echo "<hr>";
                            echo "<p>".$publishedPost['body']."</p>";
                        echo "</div>";
                        echo '<div class="topics" style="margin-left: 0px;">';
                            echo "<h2>Topics</h2>";
							$topics=getAllTopics();
                            foreach ($topics as $topic) {
                                echo "<div><a href='filtered_posts.php?topic=".$topic['id']."'>".$topic['name']."</a></div>";
                            }
                        echo "</div>";
                    echo "</div>";

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
