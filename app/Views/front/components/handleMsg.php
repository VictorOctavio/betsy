<?php if (session()->getFlashdata('successBuy')) {; ?>
   <div class="toast d-block" id="toast-cart" style="position: absolute; top: 0; margin-top: 80px; left: auto; z-index: 999">
      <div class="toast-header bg-dark d-flex justify-content-between w-100 align-content-center ">
         <strong>Betsy</strong>
         <small>Compra Finalizada</small>
         <button id="closeToast" type="button" class="btn close">x</button>
      </div>
      <div class="toast-body">
         Gracias por confiar en BETSY! <a href="<?php echo base_url('user/my-buys') ?>" target="_black" class="mx-1">Ir mis compras</a>
      </div>
   </div>
<?php } ?>

<?php if (session()->getFlashdata('successCart')) {; ?>
   <div class="toast d-block" id="toast-cart" style="position: absolute; top: 0; margin-top: 80px; left: auto; z-index: 999">
      <div class="toast-header bg-dark d-flex justify-content-between w-100 align-content-center ">
         <strong>Betsy</strong>
         <small>Agrego Correctamente</small>
         <button id="closeToast" type="button" class="btn close">x</button>
      </div>
      <div class="toast-body">
         EQUIPO BETSY ;) <a href="<?php echo base_url('user/my-cart') ?>" target="_black" class="mx-1">Ver Carrito</a>
      </div>
   </div>
<?php } ?>

<?php if (session()->getFlashdata('success')) {; ?>
   <div class="toast d-block" id="toast-cart" style="position: absolute; top: 0; margin-top: 80px; left: auto; z-index: 999">
      <div class="toast-body d-flex justify-content-between w-100 align-items-center text-dark">
         <strong>Betsy</strong>
         <small><?php echo session()->getFlashdata('success') ?></small>
         <button type="button" class="btn close" 
          id="closeToast"
         >x</button>
      </div>
   </div>
<?php } ?>

<?php if (session()->getFlashdata('danger')) {; ?>
   <div class="toast d-block" id="toast-cart" style="position: absolute; top: 0; margin-top: 80px; left: auto; z-index: 999">
      <div class="toast-body bg-danger d-flex justify-content-between w-100 align-items-center text-light">
         <strong>Betsy</strong>
         <small><?php echo session()->getFlashdata('danger') ?></small>
         <button type="button" class="btn close" 
          id="closeToast"
         >x</button>
      </div>
   </div>
<?php } ?>

<script>
   document.addEventListener('DOMContentLoaded', () => {
      let closeToast = document.querySelectorAll('#closeToast');
      let toastsCart = document.querySelectorAll('#toast-cart');
      

      closeToast.forEach(btn => {
         btn.addEventListener('click', () => {
            toastsCart.forEach(toast => {
            toast.classList.add('d-none')
            })
         })
      })
   })
</script>


