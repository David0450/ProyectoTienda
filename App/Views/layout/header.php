<?php ob_start(); ?>
<header class="p-3 text-bg-dark mb-auto">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
        </a>

        <form class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" action="" method="get">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
              <li><button class="nav-link px-2 text-secondary">Inicio</button></li>
              <li><button href="#" class="nav-link px-2 text-white">Productos</button></li>
              <li><button href="#" class="nav-link px-2 text-white">Pricing</button></li>
              <li><button href="#" class="nav-link px-2 text-white">FAQs</button></li>
              <li><button href="#" class="nav-link px-2 text-white">Sobre nosotros</button></li>
            </ul>
        </form>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-white" placeholder="Buscar..." aria-label="Search">
        </form>

        <form action="#" method="get" class="text-end">
          <button type="submit" name="uri" value="login" class="btn btn-outline-light me-2">Iniciar sesión</button>
          <button type="submit" name="uri" value="login" class="btn btn-warning">Regístrate</button>
        </form>
      </div>
    </div>
  </header>
<?php $header = ob_get_clean(); ?>