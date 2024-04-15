<?php include('../config.php'); ?>
<?php include(ROOT_PATH . '/includes/admin_functions.php'); ?>
<?php include(ROOT_PATH . '/includes/admin/head_section.php'); ?>
<?php include(ROOT_PATH . '/admin/post_functions.php'); ?>

<title>Admin | Manage users</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-dTm5Fd//rFdy4XNXPrz/uS6HdWFTpX7vK9TMpT0eLlH3pm6Pfh+iB4IrHiYzF3Dl" crossorigin="anonymous">
</head>

    <body>

        <?php include(ROOT_PATH . '/includes/admin/header.php') ?>
        <div class="container content">
            <?php include(ROOT_PATH . '/includes/admin/menu.php') ?>

            <table class="table">
					<thead>
						<th>N</th>
						<th>Author</th>
						<th>Title</th>
						<th>Views</th>
                        <th>Published</th>
                        <th>Edit</th>
                        <th>Delete</th>

					</thead>
					<tbody>
                        <?php
                            $posts = getAllPosts();
                            foreach ($posts as $key => $post) {
                                ?>
                                <tr>
                                    <td><?php echo $key + 1; ?></td>
                                    <td><?php echo $post['author']; ?></td>
                                    <td>
                                        <a href="<?php echo BASE_URL . 'single_post.php?post-slug=' . $post['slug'] ?>">
                                        <?php echo $post['title']; ?>
                                        </a>
                                    </td>
                                    <td><?php echo $post['views']; ?></td>
                                    <td>
    <a class="fa fa-check btn edit" style="background:green;" href="create_post.php?edit-post=<?php echo $post['id'] ?>">
    </a>
</td>


                                    <td>
                                        <a class="fa fa-pencil btn edit" style="background:green;" href="create_post.php?edit-post=<?php echo $post['id'] ?>">
                                        </a>
                                    </td>
                                    <td>
                                        <a class="fa fa-trash btn delete" style="background:red;" href="create_post.php?delete-post=<?php echo $post['id'] ?>">
                                        </a>    
                                    </td>
                                </tr>
                                <?php
                            }
                        ?>
						
					</tbody>
				</table>
        </div>
        

    </body>
</html>







<!-- Footer -->
<?php include(ROOT_PATH . '/includes/public/footer.php'); ?>
	<!-- // Footer -->
