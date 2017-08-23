
<div class="container">

    <div class="blog-header">
        <h1 class="blog-title"><?= $post->title; ?></h1>
        <p class="lead blog-description"><?= $post->subtitle; ?></p>
    </div>

    <div class="row">

        <div class="col-sm-12 blog-main">

            <article>
                <p><?= $post->content; ?></p>
            </article>

            <hr>

            <section id="comment">
                <form class="form-horizontal" method="POST" action="<?= $config['app.domain']; ?>/comment">
                    <input type="hidden" name="token_csrf" value="">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputPseudo3" class="col-sm-2 control-label">Pseudo</label>
                        <div class="col-sm-10">
                            <input type="text" name="pseudo"  class="form-control" id="inputPseudo3" placeholder="Pseudo">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputLastName3" class="col-sm-2 control-label">Message</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="message" id="textareaMessage3" cols="30" rows="10" placeholder="Your Message"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Send</button>
                        </div>
                    </div>
                </form>
                <hr>
                <?php foreach ($comments as $comment) : ?>
                    <?php require 'blog-comment.view.php'; ?>
                <?php endforeach; ?>
            </section>

        </div><!-- /.blog-main -->

    </div><!-- /.row -->

</div><!-- /.container -->