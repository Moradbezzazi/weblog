
<?php
function getPostTopic($post_id)
{
    global $conn;

    // Sélectionner le topic pour un article donné
    $query = "SELECT *
    FROM topics
    JOIN post_topic ON post_topic.topic_id=topics.id 
    JOIN posts ON post_topic.post_id=posts.id
    WHERE post_topic.post_id = $post_id";
    // echo $query;
    
    $result = mysqli_query($conn, $query);

    // Vérifier si la requête a réussi
    if ($result) {
        $topic = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $topic;
    } else {
        // Gestion des erreurs si la requête échoue
        return null;
    }
}

// Modifier la fonction getPublishedPosts()
function getPublishedPosts()
{
    global $conn;

    // Sélectionner tous les articles publiés (published = 1)
    $query = "SELECT * FROM posts WHERE published = 1";
    $result = mysqli_query($conn, $query);

    // Vérifier si la requête a réussi
    if ($result) {
        // Récupérer tous les résultats sous forme de tableau associatif
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

        // Enrichir chaque article avec le topic correspondant
        foreach ($posts as &$post) {
            $post_id = $post['id'];
            $topic = getPostTopic($post_id);
            $post['topics'] = $topic;
            
        }

        return $posts;
    } else {
        // Gestion des erreurs si la requête échoue
        return null;
    }
}
function getPost($slug){
    global $conn;
    // Get single post slug
    $post_query = "SELECT * FROM posts WHERE slug='$slug' AND published = 1";
    $post_result = mysqli_query($conn, $post_query);
    if ($post_result) {
        // fetch post
        $post = mysqli_fetch_assoc($post_result);
        $post["topics"]= getPostTopic($post['id']);
        return $post;
    } else {
        echo "Post not found";
    }
}
function getAllTopics(){
    global $conn;
    // Get single post slug
    $sql = "SELECT * FROM topics";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // fetch post
        $topics = mysqli_fetch_all($result, MYSQLI_ASSOC);
        
        return $topics;
    } 
}
/**
* This function returns the name and slug of a
* category in an array
*/

function getPublishedPostsByTopic($topic_id) {
    global $conn;
    $sql = "SELECT * FROM posts p JOIN post_topic pt ON p.id = pt.post_id WHERE topic_id = ".$topic_id." AND p.published = 1;";
    $result = mysqli_query($conn, $sql);
    // Récupère tous les articles sous forme d'un tableau associatif appelé $posts
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $final_posts = array();
    foreach ($posts as $post) {
        $post['topic'] = getPostTopic($post['id']);
        array_push($final_posts, $post);
    }
    return $final_posts;
}

    
?>
