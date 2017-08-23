<!DOCTYPE html>
<html lang="<?= $config['app.language']; ?>">
<head>
    <meta charset="<?= $config['app.encode']; ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= (isset($description)) ? $description : ''; ?>">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title><?= ($title) ?? $title ?? $post->title; ?></title>
    <link href="<?= $config['app.domain']; ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= $config['app.domain']; ?>/css/blog.css" rel="stylesheet">
</head>

<body>

<?php require '../ressources/views/elements/nav.php'; ?>

<?php require '../ressources/views/elements/alert.php'; ?>

<?= $body; ?>

<?php require '../ressources/views/elements/footer.php'; ?>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../../public/js/jquery/jquery.js"><\/script>')</script>
<script src="js/bootstrap/bootstrap.js"></script>
</body>
</html>