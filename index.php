<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php include("includes/public/registration_login.php"); ?>
<?php include("includes/all_functions.php"); ?>
<title>MyWebSite | Home </title>

</head>

<body>
	<div>
	

		<?php
			// $nb_ent = 10;
			// echo 'hello ${nb_ent} ///';
			// var_dump($_SESSION);
			
			
			// Vérifier si l'utilisateur est connecté
			// if(isset($_SESSION['connecte']) && $_SESSION['connecte'] === true) {
			// 	// Incrémenter le compteur de sessions (nombre d'utilisateurs connectés)
			// 	if(!isset($_SESSION['nombre_utilisateurs'])) {
			// 		$_SESSION['nombre_utilisateurs'] = 1;
			// 	} else {
			// 		$_SESSION['nombre_utilisateurs']++;
			// 	}
			// } else {
			// 	// Si l'utilisateur n'est pas connecté, assurez-vous que le compteur de sessions est initialisé à 0
			// 	$_SESSION['nombre_utilisateurs'] = 0;
			// }

			// Afficher le nombre d'utilisateurs connectés
			// echo "Nombre d'utilisateurs connectés : " . $_SESSION['nombre_utilisateurs'];
			// if(isset($_COOKIE["visite"])){
			// 	setcookie("visite" , $_COOKIE["visite"] + 1, time() + 3600);
			// 	echo ($_COOKIE["visite"] + 1);
			// }else{
			// 	setcookie("visite" , 1, time() + 3600);
			// 	echo "1";
			// }
			// var_dump($_SESSION);

			//nbr de personnes connectés
			// if(isset($_SESSION["visite"])){
			// 	$_SESSION["visite"]=$_SESSION["visite"]+1;
			// 	echo ($_SESSION["visite"] + 1);
			// }else{
			// 	$_SESSION["visite"]=1;
			// 	echo "1";
			// }
			
		?>
	</div>
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

	<script>
		let Car = function(brand, registratioNumber) {
		this.brand = brand;
		this.registrationNumber = registratioNumber;
		}

		Car.prototype.getDetails = function() {
		return `${this.brand} : ${this.registrationNumber}`;
		}

		const car1 = new Car("Peugeot", "XA2578");
		const car2 = new Car("Toyota", "GA147");

		console.log(car1.getDetails===car2.getDetails)
	</script>
	<!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->