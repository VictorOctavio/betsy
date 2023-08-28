
    <div class="dashboard">
        
        <?php 
            include "panelAdmin.php";
            include 'app/Views/front/components/handleMsg.php';
        ?>
    
        <div class="dashboard__wrapper" style="min-height: 98vh; overflow: auto">
            
            <div class="dashboard__wrapper__notify">
                <canvas id="grafica" class="grafica" data-lastmonth="<?php echo ($lastMonthSales[0]["total"]) ?>"></canvas>
            </div>
            
            <!-- var_dump -->
            <div class="dashboard__wrapper__lastUsers">
                <h5 class="mx-2 mt-2">Ultimas Compras (+  <?php echo count($lastBuys) ?> Compras)</h5>
                <div class="dashboard__wrapper__lastUsers__list mt-2">

                    <?php foreach($lastBuys as $buy): ?>
                        <div class="dashboard__wrapper__lastUsers__list__item">
                        
                            
                            <img src="<?php echo base_url('public/uploads/').$buy['avatar'] ?>" alt="user" width="60" height="60" style="border-radius: 50%; object-fit: cover; margin: 0">
                            <h6 class="dashboard__wrapper__lastUsers__list__item__name"  class="text-secondary"><?php echo $buy['lastname'].' '.$buy['firstname'] ?></h6>
                            <a  href="<?php echo base_url('admin/buy/').$buy['saleheaderId'] ?>" target="_black" class="btn btn-sm btn-info dashboard__wrapper__lastUsers__list__item__buy">
                           
                            </a>
                        </div>
                    <?php endforeach; ?>
        
                </div>
            </div>

            <div class="dashboard__wrapper__lastStock">
                <h5 class="mx-2 mt-2">Por Agotarse</h5>
                <div class="dashboard__wrapper__lastStock__list">

                    <?php foreach($agotarse as $shoe): ?>
                        <div class="dashboard__wrapper__lastStock__list__item">
                            <img src="<?php echo base_url('public/uploads/')?><?php echo explode(',',$shoe['imagesURL'])[0]?>" alt="user" width="60" height="60" style=" object-fit: contain; margin: 0">
                            <h6 class="dashboard__wrapper__lastStock__list__item__name"  class="text-secondary"><?php echo $shoe['title'] ?> - 
                            <span class="text-danger">A:<?php echo $shoe['stock'] ?>/M:<?php echo $shoe['minstock'] ?></span>
                            </h6>
                            <a href="<?php echo base_url('admin/products/').$shoe['id'] ?>" 
                            class="btn btn-sm btn-warning dashboard__wrapper__lastStock__list__item__edit" title="ver compra"><i class="bi bi-pencil-square"></i></a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>   

