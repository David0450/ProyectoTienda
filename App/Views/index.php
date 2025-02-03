<?php 
    include __DIR__ . '/layout/head.php';
    include __DIR__ . '/layout/header.php';
    include __DIR__ . '/layout/footer.php';
    include __DIR__ . '/layout/sidebar.php';
?>

<!DOCTYPE html>
<html class="h-100" lang='es'>
<?= $head ?>
<body class="h-100 text-center text-bg-dark">
    <?= $sidebar ?>
    <div id="contentDiv" class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <?= $header ?>
        <?= $content ?>
        <?= $footer ?>
    </div>
    <!--<?= $script ?>-->
    <script src="../Public/scripts/script.js"></script>

</body>
</html>