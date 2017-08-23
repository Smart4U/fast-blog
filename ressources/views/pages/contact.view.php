<?php
$title = 'Contact';
$subtitle = '';
$description = '';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(is_iterable($_POST)){
        foreach ($_POST as $key => $value) {
            $_POST[$key] = htmlspecialchars($value);
        }
    }

    // Validate tokenCSRF and data
    try {
        // Send mail
        $_SESSION['flash']['success'][0] = 'Email send with success.';
        // Redirect
    } catch (RuntimeException $e) {
        $e->getMessage();
    }

}
?>
<div class="container">

    <div class="blog-header">
        <h1 class="blog-title"><?= $title; ?></h1>
        <p class="lead blog-description"><?= $subtitle; ?></p>
    </div>

    <div class="row">

        <div class="col-sm-12 blog-main">

            <form class="form-horizontal" method="POST" action="<?= $config->app['domain']; ?>/contact">
                <input type="hidden" name="token_csrf" value="">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPhone3" class="col-sm-2 control-label">Phone</label>
                    <div class="col-sm-10">
                        <input type="phone" name="phone"  class="form-control" id="inputPhone3" placeholder="Phone">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputFirstName3" class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="first_name" id="inputFirstName3" placeholder="First Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputLastName3" class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="last_name" id="inputLastName3" placeholder="Last Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputSubject3" class="col-sm-2 control-label">Subject</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="subject" id="inputSubject3" placeholder="Subject">
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

        </div><!-- /.blog-main -->

    </div><!-- /.row -->

</div><!-- /.container -->