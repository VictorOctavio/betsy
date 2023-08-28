<?php
   $session = session();
   $cart =\Config\Services::cart();
   $cart = $cart->contents();
   $total = 0;
?>

<?php 
    include 'app/Views/front/components/handleMsg.php';
?>

<div class="mycart">
      <?php if ($cart): ?>
      <div class="mycart__wrapper container">
         <h3 class="mycart__wrapper__title mb-4">Mi Carrito</h3>
         <div class="mycart__wrapper__list">
            <table class="table table-sm">
               <tr> 
                  <th scope="col"><i class="bi bi-card-image"></i></th>
                  <th scope="col">Titulo</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Cantidad</th>
                  <th scope="col">Talle</th>
                  <th scope="col">Actions</th>
               </tr>

               <?php 
                  echo form_open('user/update-cart');
                  $total = 0;
                  $i = 1;

                  foreach ($cart as $shoe):
                     $total += $shoe['price'] * $shoe['qty'];
                     echo form_hidden('cart[' . $shoe['id'] . '][id]', $shoe['id']);
                     echo form_hidden('cart[' . $shoe['id'] . '][rowid]', $shoe['rowid']);
                     echo form_hidden('cart[' . $shoe['id'] . '][name]', $shoe['name']);
                     echo form_hidden('cart[' . $shoe['id'] . '][price]', $shoe['price']);
                     echo form_hidden('cart[' . $shoe['id'] . '][qty]', $shoe['qty']);
                     echo form_hidden('cart[' . $shoe['id'] . '][imgURL]', $shoe['imgURL']);
                     echo form_hidden('cart[' . $shoe['id'] . '][size]', $shoe['size']);
               ?>
       

                  <tr>
                     <td>
                     <img src="<?php  echo base_url('public/uploads/').$shoe['imgURL']; ?>" class="m-0 p-0" alt="img" width="120" height="40" style=" object-fit: cover;"/>
                     </td>
                     <td><?php echo $shoe['name'] ?></td>
                        <td>$<?php echo $shoe['price'] ?></td>
                        <td>
                          <?php echo $shoe['qty'] ?>
                        </td>
                        <td><?php echo $shoe['size'] ?></td>
                        <td><a href="<?php echo base_url('user/remove-item-cart/'.$shoe['rowid']) ?>" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></a></td>
                  </tr>
               <?php endforeach; ?>
            </table>
            </div>

            <div class="mycart__wrapper__finish">
               <p class="m-0">TOTAL: USD $<?php echo $total ?></p>   
               <div class="mycart__wrapper__finish__btns">
                  <button type="button" class="btn btn-ligth"  data-bs-toggle="modal" data-bs-target="#terminos-compra">Ver términos</button>
                  <button  type="button" data-bs-toggle="modal" data-bs-target="#finish-compra" class="btn btn-success">Pagar</button>
                  <a class="btn btn-danger" href="<?php echo base_url('user/remove-cart') ?>" >Eliminar</a>
               </div>
            </div>
         </div>
      </div>
       <?php echo form_close(); ?>


      <?php else: ?>
        <div class="container d-flex justify-content-center flex-column align-items-center" style="min-height: 80vh">
         <p style="">No tienes productos agregados al tu carrito :C</p>
         <a class="btn btn-dark" href="<?php echo base_url('/products') ?>">Descubre en Betsy</a>
        </div>
      <?php endif; ?>


<div class="modal fade" id="terminos-compra" tabindex="-1" aria-labelledby="terminos-compraLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="terminos-compraLabel">Condiciones Compra</h1>
        <button type="button" class="btn-close btn-ligth" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mt-3">
          <h5>NO SE ADMITE LA COMPRA CON FINES DE REVENTA</h5>
          <p>Las Tiendas BETSY, incluidos los derechos o las políticas de los consumidores que se ofrecen en las Tiendas BETSY, están destinadas solo al beneficio de los consumidores finales y, por lo tanto, la compra de productos para la reventa está estrictamente prohibida.</p>
        </div>

        <div class="mt-4">
          <h5>DEVOLUCIONES DE PRODUCTOS DEFECTUOSOS</h5>
          <p>Tiene derecho a devolver los productos que fuesen defectuosos o que, de otro modo, no cumpliesen con su pedido cuando los recibiese.</p>
        </div>

        <div class="mt-4">
          <h5>INFORMACIÓN SOBRE REEMBOLSOS</h5>
          <p>Los reembolsos se emitirán en la forma de pago original. Esto se aplica a todas las devoluciones a la Tienda BETSY. </p>
        </div>
    
      </div>
    </div>
  </div>
</div>



<div class="modal fade" id="finish-compra" tabindex="-1" aria-labelledby="terminos-compraLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-body mx-auto" style="position: relative">

         <span style="color: crimson; position: absolute; top: 1%; left: 80%; font-size: 14px; font-weight: bold;"
         >betsy</span>

        <div class="box-1 bg-light user">
            <div class="d-flex align-items-center">
                <img src="<?php echo base_url('public/uploads/').session()->get('avatar') ?>"
                    class="pic rounded-circle" alt="">
                <p class=" name mx-1 mt-3"><?php echo session()->get('fullname')?></p>
            </div>
        </div>
        
        <div class="box-2">
            <div class="box-inner-2">
                <div>
                    <p class="fw-bold">Detalle Pago</p>
                    <p class="dis mb-3">Complete por favor con sus datos, para finalizar la compra</p>
                </div>
                <form method="get" action="<?php echo base_url('user/buy-cart') ?>">
                    <div class="mb-3">
                        <p class="dis fw-bold mb-2">Email</p>
                        <input class="form-control" type="email" value="<?php echo session()->get('email') ?>">
                    </div>
                    <div>
                        <p class="dis fw-bold mb-2">Tarjeta</p>
                        <div class="d-flex align-items-center justify-content-between card-atm border rounded">
                            <div class="fab fa-cc-visa ps-3"></div>
                            <input name="creditCard" type="text" class="form-control" placeholder="Card Details">
                            <div class="d-flex w-50">
                                <input name="creditCardVencimiento" type="text" class="form-control px-0" placeholder="MM/YY">
                                <input name="creditCardPass" type="password" maxlength=3 class="form-control px-0" placeholder="CVV">
                            </div>
                        </div>

                        <div class="address mt-3">
                            <p class="dis fw-bold mb-3">Direccion</p>
                            <select class="form-select" aria-label="Default select example">
                                <option selected >Argentina</option>
                                <option value="1">Chile</option>
                                <option value="2">Brasil</option>
                                <option value="3">Uruguay</option>
                            </select>
                            <div class="d-flex">
                                <input class="form-control zip" type="text" placeholder="Cuidad">
                                <input class="form-control state" type="text" placeholder="Estado">
                            </div>
                            <div class=" my-3">
                                <p class="dis fw-bold mb-2">Telefono</p>
                                <div class="inputWithcheck">
                                    <input class="form-control" type="text" value="+54 ">
                                </div>
                            </div>
                            <div class="d-flex flex-column dis">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p>IVA</p>
                                    <p><span class="fas fa-dollar-sign"></span>Incluido</p>
                                </div>              
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <p class="fw-bold">Total</p>
                                    <p class="fw-bold"><span class="fas fa-dollar-sign"></span>$<?php echo $total ?></p>
                                </div>
                                <button type="submit" class="btn btn-success mt-2">Pagar<span class="fas fa-dollar-sign px-1"></span>$<?php echo $total ?>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>



      </div>
    </div>
  </div>
</div>