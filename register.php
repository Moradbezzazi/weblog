
<?php include('config.php'); ?>
<?php include('includes/public/head_section.php'); ?>
<?php include("includes/public/registration_login.php"); ?>
<title>MyWebSite | Home </title>

</head>

<body>

	<div class="container">

		<!-- Navbar -->
		<?php include(ROOT_PATH . '/includes/public/navbar.php'); ?>
		<!-- // Navbar -->

		<!-- register -->
        <h2>Register now !</h2>
        <form method="post" action="register.php">
            <?php include(ROOT_PATH . '/includes/public/errors.php') ?>
            <label>Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>">
            
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo $email; ?>">
            
            <label>Password:</label>
            <input type="password" name="password1">
            
            <label>Confirm Password:</label>
            <input type="password" name="password2">
            
            <button class="btn" type="submit" name="register_btn">Register</button>
            already a member? <a href='./login.php'>Sign in </a>
        </form>



		<!-- // register -->

		


	</div>
	<!-- // container -->


	<!-- Footer -->
	<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->
