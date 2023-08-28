<style>

   table td,
   table th {
   text-overflow: ellipsis;
   white-space: nowrap;
   overflow: hidden;
   }

   thead th {
   color: #fff;
   }

   .card {
   border-radius: .5rem;
   }

   .table-scroll {
   border-radius: .5rem;
   }

   .table-scroll table thead th {
   font-size: 1.25rem;
   }
   thead {
   top: 0;
   position: sticky;
   }
</style>

<div class="dashboard">

    <?php 
        include "panelAdmin.php";
        include 'app/Views/front/components/handleMsg.php';
    ?>
      
    <div style="padding: 30px; max-height: 95vh !important; overflow: auto; background-color: #fff">
    
    <section class="intro">
  <div class="bg-image h-100" style="background-color: #f5f7fa;">
    <div class="mask d-flex align-items-center h-100">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="card">
              <div class="card-body p-0">
                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true" style="position: relative; height: auto">


                <div class="p-3">
                  <div class="d-flex gap-2 align-items-center justify-content-between w-100">

                     <div class="d-flex gap-2 align-items-center">
                        <img src="<?php echo base_url('public/uploads/').$header['avatar']?>"
                           width="70" height="70" style="border-radius: 50%; object-fit: cover" 
                        />
                        <p class="m-0" style="text-transform: capitalize"><strong> <?php echo $header['firstname'].' '.$header['lastname'] ?></strong></p>
                     </div>
                  
                     <strong >Fecha: <?php echo $header['sale_createdAt'] ?></strong>
                  </div>
         
                  
                  <p class="mt-3">Compra ID: #<?php echo $header['saleheaderId'] ?> </p>
                  <strong>Estado:</strong> <button class="btn btn-success btn-sm" disabled>pagado</button>
               </div>

                  <table class="table table-striped mb-0">
                    <thead style="background-color: crimson;">
                      <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Talle</th>
                        <th scope="col">Total</th>
                      </tr>
                    </thead>
                    <tbody>
                     
                    <?php foreach($products as $product): ?>
                      <tr>
                        <td><?php echo $product['title']?></td>
                        <td>$<?php echo $product['sale_price']?></td>
                        <td><?php echo $product['cantidad']?></td>
                        <td><?php echo $product['sale_size']?></td>
                        <td>$<?php echo $product['sale_price'] * $product['cantidad']?></td>
                      </tr>
                     <?php endforeach; ?>
                     
                    </tbody>
                    <tfoot>
                     <tr>
                        <td colspan="4" class="total">Total:</td>
                        <td><strong>$<?php echo $header['total_venta']?></strong></td>
                     </tr>

                     <tr>
                        <td colspan="4" class="total">Estado: <?= $header['received'] ? 'EN CAMINO' : 'EN PROCESO'  ?></td>
  
                        <?php if (!$header['received']) { ?>
                            <td>
                              <a href="<?php echo base_url('admin/buy/changeStateReceived/').$header['saleheaderId'] ?>" class="btn btn-success btn-sm" href="#">
                                Cambiar a Despachado
                              </a>
                            </td>
                          <?php } ?>

                        <?php if ($header['received']) { ?>
                            <td><button class="btn btn-success btn-sm" disabled>FUE ENVIADO</button></td>
                        <?php } ?>

                       
                      </tr>

                      <tr>
                        <td colspan="4" class="total"></td>
                        <td>

                          <form method="post" action="<?php echo base_url('/send-email') ?>">
                            <input type="hidden" value="'Gracias por confiar en BETSY! estamos atento a cualquier duda o reclamo'" name="msg">
                            <input type="hidden" value="<?php echo 'Se ha despachado tu pedido con el ID: #'.$header['saleheaderId']?>" name="title">
                            <input type="hidden" value="<?php echo $header['email'] ?>" name="para">
                            <input type="hidden" value="<?php echo session()->get('email') ?>" name="email">
                            <button class="btn btn-outline-danger btn-sm"><i class="bi bi-bell-fill"></i> NOTIFICAR</button>
                          </form>
                        </td>
                      </tr>

                     </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
   
   
   
   
   
   </div>

</div>