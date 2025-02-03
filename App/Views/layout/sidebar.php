<?php ob_start(); ?>
<button id="modalCloseButton" class="vh-100 vw-100 position-absolute z-1 start-0 border-0" style="display:none; background-color: rgba(0, 0, 0, 0.5)"></button>
<aside id="sidebar" class="d-flex flex-column align-items-stretch flex-shrink-0 bg-dark position-fixed end-0 z-2 h-100 text-ligth" style="width: 35%; transform: translateX(100%); transition:transform 0.5s ease;">
    <span class="fs-3 py-3 fw-semibold ">Mi cesta</span>
    <div class="list-group list-group-flush border-bottom scrollarea overflow-y-scroll flex-column-reverse d-flex">
	  <div id="cart-items">
		
	  </div>
    </div>
</aside>
<script>

</script>
<?php $sidebar = ob_get_clean(); ?>
