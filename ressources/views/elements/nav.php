<div class="blog-masthead">
    <div class="container">
        <nav class="blog-nav">
            <?php foreach ($navigate as $nav) : ?>
                <a class="blog-nav-item <?= ($_SERVER['REQUEST_URI'] == '/' . $nav->slug) ? 'active': '' ; ?>" href="/<?= $nav->slug ;?>"><?= $nav->name ;?></a>
            <?php endforeach; ?>
        </nav>
    </div>
</div>