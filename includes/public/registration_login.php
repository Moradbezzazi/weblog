<?php
    // variable declaration
    $username = "";
    $email = "";
    // var_dump($username); die();
    $errors = array();
    // LOG USER IN
    if (isset($_POST['login_btn'])) {
        $username = esc($_POST['username']);
        $password = esc($_POST['password']);
        
        if (empty($username)) {
            array_push($errors, "Username required");
        }
        if (empty($password)) {
            array_push($errors, "Password required");
        }
        if (empty($errors)) {
            $password = md5($password); // encrypt password
            $sql = "SELECT * FROM users WHERE username='$username' and password='$password' LIMIT 1";
            
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) > 0) {
                // get id of created user
                $reg_user_id = mysqli_fetch_assoc($result)['id'];
                //var_dump(getUserById($reg_user_id)); die();
                // put logged in user into session array
                $_SESSION['user'] = getUserById($reg_user_id);
                // if user is admin, redirect to admin area
                if (in_array($_SESSION['user']['role'], ["Admin", "Author"])) {
                    $_SESSION['message'] = "You are now logged in";
                    // redirect to admin area
                    header('location: ' . BASE_URL . '/admin/dashboard.php');
                    exit(0);
                } else {
                    $_SESSION['message'] = "You are now logged in";
                    // redirect to public area
                    header('location: index.php');
                    exit(0);
                }
               
            } 
            else {
                
                array_push($errors, 'Wrong credentials');
            }
            
        }
    }
    
  

    // Traitement du formulaire d'inscription
    if (isset($_POST['register_btn'])) {
        // Initialiser les variables
        $username = "";
        $email = "";    
        // Récupérer les données du formulaire
        $username = esc($_POST['username']);
        $email = esc($_POST['email']);
        $password1 = esc($_POST['password1']);
        $password2 = esc($_POST['password2']);

        // Vérifier si les champs obligatoires sont vides
        if (empty($username)) { array_push($errors, "Username required"); }
        if (empty($email)) { array_push($errors, "Email required"); }
        if (empty($password1)) { array_push($errors, "Password required"); }
        // Vérifier si les mots de passe correspondent
        if ($password1 != $password2) {
            array_push($errors, "Passwords do not match");
        }

        // Vérifier l'unicité du couple (username, email)
        $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($conn, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) {

            if ($user['email'] === $email) {
                array_push($errors, "Email already exists");
            }
        }

        // Si aucune erreur, inscrire l'utilisateur
        if (empty($errors)) {
            $password = md5($password1); // Hacher le mot de passe avant de le stocker

            // Récupérer la date actuelle au format MySQL
            $currentDateTime = date("Y-m-d H:i:s");

            // Utiliser cette date dans votre requête SQL
            $query = "INSERT INTO users (id, username, email, role, password, created_at, updated_at) 
                    VALUES (NULL, '$username', '$email', 'Author', '$password', '$currentDateTime', '$currentDateTime')";
            echo($query);
            mysqli_query($conn, $query);

            // Récupérer l'id de l'utilisateur fraîchement inscrit
            $reg_user_id = mysqli_insert_id($conn);

            // Mettre des données dans la session de l'utilisateur
            $_SESSION['user'] = getUserById($reg_user_id);

            // Rediriger l'utilisateur vers la page appropriée
            
            if($_SESSION['user']['role'] == "Author"){
                $_SESSION['message'] = "Registration successful. You are now logged in.";
                header('location: ' . BASE_URL . '/index.php');
                exit(0);
            }
            else if ($_SESSION['user']['role'] == "Admin") {
                $_SESSION['message'] = "Registration successful. You are now logged in.";
                header('location: ' . BASE_URL . '/admin/dashboard.php');
                exit(0);
            } 
            else {
                $_SESSION['message'] = "Registration successful. You are now logged in.";
                // header('location: index.php');
                exit(0);
            }
        }
        
    }



    // Get user info from user id
    function getUserById($id)
    {
        global $conn; //rendre disponible, à cette fonction, la variable de connexion $conn
        $sql = "SELECT * FROM users WHERE id=$id";// requête qui récupère le user et son rôle
        $result = mysqli_query($conn, $sql);//…/la fonction php-mysql
        $user = mysqli_fetch_assoc($result);//…/je met $result au format associatif
        return $user;
    }
    function esc(String $value){
        //à compléter ultérieurement
        $val = trim($value); // remove empty space sorrounding string
        return $val;
    }


?>