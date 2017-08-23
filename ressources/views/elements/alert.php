<?php
if(!empty($_SESSION['flash']['success'])) {
    foreach ($_SESSION['flash']['success'] as $message) {
        echo '<div class="alert alert-success" role="alert">' .$message. '</div>';
    }
    unset($_SESSION['flash']);
}
if(!empty($_SESSION['flash']['error'])) {
    foreach ($_SESSION['flash']['error'] as $message) {
        echo '<div class="alert alert-danger" role="alert">' .$message. '</div>';
    }
    unset($_SESSION['flash']);
}
?>