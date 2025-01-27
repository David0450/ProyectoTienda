<?php ob_start(); ?>
<main>
    <div class="login-container">
        <article>
            <section id="login" class="login-section login-show">
                <h2>Iniciar sesión</h2>
                <form>
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Contraseña">
                    <button type="submit" name="iniciar-sesion" class="submit-button">Iniciar sesión</button>
                </form>
                <button onclick="loginTransition()" type="button" class="register-button">Crear cuenta</button>
            </section>
            <section id="register" class="register-section register-hide">
                <h2>Crear cuenta</h2>
                <form>
                    <input type="text" name="name" placeholder="Nombre">
                    <input type="text" name="email" placeholder="E-mail">
                    <input type="password" name="password" placeholder="Contraseña">
                    <button type="submit" name="crear-cuenta" class="submit-button">Crear cuenta</button>
                </form>
                <button onclick="registerTransition()" type="button" class="login-button">Iniciar sesión</button>
            </section>
        </article>
    </div>
</main>
<script>
	let registerHTML = document.getElementById("register");
let loginHTML = document.getElementById("login");

function loginTransition() {
    loginHTML.classList.toggle("login-show");
    loginHTML.classList.toggle("login-hide");
    registerHTML.classList.toggle("register-hide");
    registerHTML.classList.toggle("register-show");
}

function registerTransition() {
    registerHTML.classList.toggle("register-hide");
    registerHTML.classList.toggle("register-show");
    loginHTML.classList.toggle("login-hide");
    loginHTML.classList.toggle("login-show");
}
</script>
<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/../index.php'; ?>