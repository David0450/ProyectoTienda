<?php ob_start(); ?>
<main>
    <div class="login-container">
        <article>
            <section id="login" class="login-section login-show">
                <h2>Iniciar sesión</h2>
                <form method="post" action="">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Contraseña">
                    <button type="submit"  name="uri" value="user/login" class="submit-button">Iniciar sesión</button>
                </form>
                <button onclick="loginTransition()" type="button" class="register-button">Crear cuenta</button>
            </section>
            <section id="register" class="register-section register-hide">
                <h2>Crear cuenta</h2>
                <form method="post" action="">
                    <input type="text" name="username" placeholder="Usuario">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Contraseña">
                    <button type="submit" name="uri" value="user/signup" class="submit-button">Crear cuenta</button>
                </form>
                <button onclick="registerTransition()" type="button" class="login-button">Iniciar sesión</button>
            </section>
        </article>
    </div>
</main>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../index.php'; ?>