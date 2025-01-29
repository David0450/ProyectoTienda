<?php ob_start(); ?>
<header class="text-bg-dark mb-auto border-bottom border-light pb-2">
    <div class="">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <form class="nav col-12 col-lg-auto mb-2 justify-content-center mb-md-0 me-lg-5 ms-lg-3" action="" method="get">
                <button class="navbar-brand bg-transparent border-0 d-flex flex-column align-items-center" type="submit">
                      <?php if (isset($_SESSION['user_role'])) { 
                          if ($_SESSION['user_role'] == 1) { ?>
                              <img src="../Public/assets/imgs/logo_admin.png" alt="Logo" width="100">
                          <?php } else { ?>
                              <img src="../Public/assets/imgs/logo.png" alt="Logo" width="100">
                      <?php }} else { ?>
                          <img src="../Public/assets/imgs/logo.png" alt="Logo" width="100">
                      <?php } ?>
                </button>
          </form>
        

        <form class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0" action="" method="get">
            <ul class="border-start border-end border-light nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 fs-5">
              <li class="px-3 border-start border-end border-light"><button href="" name="uri" value="products/view" class="nav-link px-2 text-white">Productos</button></li>
              <li class="px-3 border-start border-end border-light"><button href="#" class="nav-link px-2 text-white">Pricing</button></li>
              <li class="px-3 border-start border-end border-light"><button href="#" class="nav-link px-2 text-white">FAQs</button></li>
              <li class="px-3 border-start border-end border-light"><button href="#" class="nav-link px-2 text-white">Sobre nosotros</button></li>
            </ul>
        </form>

        <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-white" placeholder="Buscar..." aria-label="Search">
        </form>


        <form class="user-profile-tab fs-3 p-1" method="get" action="">
            <button type="submit" name="uri" value="<?php if (isset($_SESSION['user_id'])) {echo"user/profile/view";} else {echo "login";}?>" class="btn color-transparent text-light fs-5 d-flex align-items-center">
                <img src="../Public/assets/imgs/person-circle.svg" alt="profile" width="35" height="35">
                <p class="mb-0 ms-2"><?php if(isset($_SESSION['username'])) {echo "Hola, ".$_SESSION['username'];} else {echo "Mi cuenta";}?></p>
            </button> 
        </form>
        <button id="cartButton" class="btn color-transparent text-light fs-5 d-flex align-items-center me-lg-5 p-1">
            <img src="../Public/assets/imgs/cart.svg" alt="profile" width="35" height="35">
            <p class="mb-0 ms-2">Mi cesta</p>
        </button> 
    </div>
</div>
  </header>
<?php $header = ob_get_clean(); ?>