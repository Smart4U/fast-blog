<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
    <div class="sidebar-module sidebar-module-inset">
        <h4>About Blog</h4>
        <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>

    <div class="sidebar-module">
        <h4>Réseaux sociaux</h4>
        <ol class="list-unstyled">
            <li><a href="#">GitHub</a></li>
            <li><a href="#">Twitter</a></li>
            <li><a href="#">Facebook</a></li>
        </ol>
    </div>

    <div class="sidebar-module">
        <h4>Catégories</h4>
        <ol class="list-unstyled">
            <?php foreach($categories as $category) : ?>
                <li><a href="<?= $config->app['domain'] .'/category/' . $category->name;  ?>"><?= $category->name; ?></a></li>
            <?php endforeach; ?>
        </ol>
    </div>
</div><!-- /.blog-sidebar -->

