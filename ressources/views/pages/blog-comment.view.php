<div class="panel panel-default">
    <div class="panel-body">
        <small>Pseudo : <?= $comment->author; ?></small>
        <p><?= $comment->content;?></p>
    </div>
</div>
<div>
<?php if (isset($comment->children)): ?>
    <?php foreach ($comment->children as $comment): ?>
        <?php require 'blog-comment.view.php'; ?>
    <?php endforeach; ?>
<?php endif; ?>
</div>
