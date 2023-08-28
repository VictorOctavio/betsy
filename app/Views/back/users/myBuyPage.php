<div class="myBuy">
    <div class="myBuy__wrapper container" style="min-height: 90vh">
        <h3 class="display-5 m-0 mt-5" style="border-bottom: 1px solid #ccc; font-family: var(--fontMain)">Historial Compras</h3>
        <table class="table table-hover mt-3" style="max-height: 80vh; overflow: auto">
        
        <?php if(count($buys) > 0) {; ?>
          <thead>
              <tr>
              <th scope="col">ID COMPRA</th>
              <th scope="col">Fecha</th>
              <th scope="col">Total Compra</th>
              <th scope="col">Estado</th>
              <th scope="col">Factura</th>
              </tr>
          </thead>
        <?php } ?>
        
        <?php if(count($buys) <= 0) {; ?>
          <p class="mt-5" style="text-align: center">Aun no realizaste compras. Equipo betsy ;)
            </br> <a class="btn btn-dark mt-3" href="<?php echo base_url('products/sales') ?>">Ver ofertas</a>
          </p>
        <?php } ?>
       
        <tbody>
          <?php foreach($buys as $buy): ?>
            <tr>
                <th scope="row"><?php echo $buy['saleheaderId'] ?></th>
                <td><?php echo $buy['sale_createdAt'] ?></td>
                <td>$<?php echo $buy['total_venta'] ?></td>
                <td><?= !$buy['received'] ? '<span class="text-warning">EN PROCESO</span>': '<span class="text-success">EN CAMINO</span>' ?></td>
                
                <td>
                    <a target="_blanck" href="<?php echo base_url('user/invoice/').$buy['saleheaderId']; ?>" class="btn btn-sm btn-danger"><i class="bi bi-arrow-bar-down"></i></a>
                </td>
            </tr>
          <?php endforeach; ?>
           
        </tbody>
        </table>
    </div>
</div>
