<?php ob_start(); ?>
<main></main>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . "/../index.php";?>