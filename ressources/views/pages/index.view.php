<?php
$title = 'Accueil';
$subtitle = '';
$description = '';

// SIDEBAR
$categories = $pdo->query('SELECT * FROM categories WHERE nav = FALSE');

// POSTS
$posts = $pdo->query('SELECT * FROM posts ORDER BY updated_at DESC LIMIT 5');
?>
<div class="container">

    <div class="blog-header">
        <h1 class="blog-title"><?= $title; ?></h1>
        <p class="lead blog-description"><?= $subtitle; ?></p>
    </div>

    <div class="row">

        <div class="col-sm-8 blog-main">

            <?php foreach ($posts->fetchAll() as $post) : ?>

                <?php /*$cache->cache($post, function () use ($post) { */ ?>
                <div class="blog-post">
                    <a href="<?= $config['app.domain']; ?>/blog/<?= $post->slug;?>-<?= $post->id;?>"><h2 class="blog-post-title"><?= $post->title; ?></h2></a>
                    <p class="blog-post-meta"><?= $post->updated_at; ?> by <a href="#"><?= $post->author_id; ?></a></p>
                    <p><?= $post->subtitle; ?></p>

                 <?= substr($post->content, 0, 100) . '...'; ?>
                </div><!-- /.blog-post -->
                <?php /*}); */?>

            <?php endforeach; ?>

        </div><!-- /.blog-main -->

        <?php include '../ressources/views/elements/sidebar.php'; ?>

    </div><!-- /.row -->

</div><!-- /.container -->