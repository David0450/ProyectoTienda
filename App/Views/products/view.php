<?php ob_start(); ?>
<h1>Esto sería Products/View</h1>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../index.php'; ?>