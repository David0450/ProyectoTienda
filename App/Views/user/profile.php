<?php ob_start(); ?>
<div class="container d-flex justify-content-center align-items-center h-100">
    <div class="card profile-card">
        <div class="card-body text-center">
            <img src="../Public/assets/imgs/blank_profile.jpg" alt="User Profile" class="rounded-circle profile-img mb-3">
            <h3 class="card-title mb-2"><?= $_SESSION['username'] ?></h3>
            <p class="card-text text-muted mb-3"><?php echo $_SESSION['user_role'] == 1 ? 'Administrador de la Web' : 'Usuario' ?></p>
            <p class="card-text mb-4">Esto sería una prueba de una pequeña carta de usuario, hecha en bootstrap.</p>
            <div class="social-icons mb-4">
                <a href="#" class="me-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="me-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="me-2"><i class="fab fa-linkedin-in"></i></a>
                <a href="#"><i class="fab fa-github"></i></a>
            </div>
            <form action="" method="get">
                <button type="submit" class="btn btn-danger btn-lg w-100" name="uri" value="user/logout">Cerrar sesión</button>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../index.php'; ?>