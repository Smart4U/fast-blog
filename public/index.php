<?php

require dirname(__DIR__) . '/bootstrap.php';

session_start();

// CONFIG
$config = [
    'app.encode' => 'utf-8',
    'app.language' => 'fr',
    'app.domain' => '',

    'db.name' => '',
    'db.user' => '',
    'db.pass' => ''
];


function notFound() {
    http_response_code(404);
    die('Not Found');
}

// DATABASE
$pdo = new PDO("mysql:host=localhost;dbname=".$config['db.name'], $config['db.user'], $config['db.pass'], [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ]);

// NAVBAR
$navigate = $pdo->query('SELECT * FROM categories WHERE nav = TRUE ORDER BY position ASC');


// VIEW
$uri = ($_SERVER['REQUEST_URI'] === '/') ? '/index' : rtrim($_SERVER['REQUEST_URI'], '/');
$file = '../ressources/views/pages'. $uri .'.view.php';


// Static Page
if( file_exists($file))
{
    ob_start(); require $file;
    $body = ob_get_clean();
    require '../ressources/views/layouts/default.php';
}
// Blog Show
elseif (preg_match('#^/(blog)/([\w-]+)-([\d]+)$#', $uri, $match))
{
    // Post
    $post = $pdo->query('SELECT * FROM posts WHERE id=' . (int)htmlspecialchars($match[3]))->fetch();
    if(!$post || $post->slug !== (string)htmlspecialchars($match[2])){
        notFound();
    }


    // Comment
    $comments = $pdo->query('SELECT * FROM comments WHERE post_id=' . $post->id)->fetchAll();
    $commentsOrderByID = [];
    foreach ($comments as $comment) {
        $commentsOrderByID[$comment->id] = $comment;
    }

    foreach ($comments as $k => $comment) {
        if($comment->parrent_id > 0){
            $commentsOrderByID[$comment->parrent_id]->children[] = $comment;
            unset($comments[$k]);
        }
    }

    ob_start();
    require '../ressources/views/pages/show.view.php';
    $body = ob_get_clean();
    require '../ressources/views/layouts/default.php';
}
// Blog Comments
elseif (preg_match('#^/(comment)$#', $uri, $match))
{
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(!empty($_POST)){
            foreach ($_POST as $key => $value) {
                $_POST[$key] = (string)htmlspecialchars($value);
            }
            if(empty($_POST['pseudo']) && empty($_POST['email']) || empty($_POST['message'])) {
                $_SESSION['flash']['error'][0] = 'Vous devez remplir tout les champs.';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit;
            }
            // Validate
            // Save
            // Redirect
        }
    }

}
// 404 Not Found
else
{
    notFound();
}

?>


