<?php ob_start(); ?>
<button id="modalCloseButton" class="vh-100 vw-100 position-absolute z-1 start-0 border-0" style="display:none; background-color: rgba(0, 0, 0, 0.5)"></button>
<aside id="sidebar" class="d-flex flex-column align-items-stretch flex-shrink-0 bg-dark position-fixed end-0 z-2 h-100 text-ligth" style="width: 580px; transform: translateX(100%); transition:transform 0.5s ease;">
    <span class="fs-3 py-3 fw-semibold ">Mi cesta</span>
    <div class="list-group list-group-flush border-bottom scrollarea overflow-y-scroll">
      <a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1">List group item heading</strong>
          <small>Wed</small>
        </div>
        <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
      </a>
      <?php if(!isset($productosCarrito)) {echo "<span class='fs-3 border-top-1 border-light'>Cesta vacía</span>";} else { foreach($productosCarrito as $producto) {?>
      <a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
        <div class="d-flex w-100 align-items-center justify-content-between">
          <strong class="mb-1"><?= $producto['nombre'] ?></strong>
          <small><?= $producto['precio'] ?></small>
        </div>
        <div class="col-10 mb-1 small"><?= $producto['descripcion'] ?></div>
      </a>
      <?php } };?>
    </div>
</aside>
<script>

</script>
<?php $sidebar = ob_get_clean(); ?>
