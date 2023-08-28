
<?php 
    include 'app/Views/front/components/handleMsg.php';
?>


<!-- Servicio validacion -->
<?php $validation = \Config\Services::validation(); ?>


<div class="dashboard">

    <?php 
        include "panelAdmin.php";
    ?>

    <div style="background-color: #fff; padding: 30px 50px; height: 98vh; overflow: auto">
        <table class="table" style="">
            <thead class="thead-dark bg-dark text-white">
                <tr>
                <th scope="col"><i class="bi bi-card-image"></i></th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($shoes as $shoe): ?>
                    <tr>
                        <th scope="row">
                            <img src="<?php echo base_url('public/uploads/')?><?php echo explode(',',$shoe['imagesURL'])[0]?>" width="40" height="40"
                                style="object-fit: contain;"
                            /> 
                        </th>   
                        
                        <td data-bs-toggle="modal" data-bs-target="#edit"
                         id="titleShoes" data-title="<?php echo $shoe['title'] ?>" 
                         data-description="<?php echo $shoe['description'] ?>" 
                         data-img="<?php echo explode(',',$shoe['imagesURL'])[0]; ?>"
                         data-price="<?php echo $shoe['price'] ?>" 
                         data-stock="<?php echo $shoe['stock'] ?>" 
                         data-minstock="<?php echo $shoe['minstock'] ?>" 
                         data-category="<?php echo $shoe['name'] ?>" 
                         data-id="<?php echo $shoe['id'] ?>" 

                         style="max-width: 20vw; overflow: hidden; text-transform: capitalize; text-decoration: underline; cursor: pointer; text-overflow: ellipsis; white-space: nowrap;">
                         <?php echo $shoe['title'] ?> 
                        </td>
                       
                         <td style="overflow: hidden; text-transform: capitalize; text-overflow: ellipsis; max-width: 20vw; white-space: nowrap;">
                             <?php echo $shoe['description'] ?>
                        </td>

                        <td class="d-flex gap-1 border-0 mt-1">
                       
                            <a href="<?php echo base_url('admin/products/')?><?php echo $shoe['id'] ?>" class="btn btn-sm btn-warning" ><i class="bi bi-pencil"></i></a>

                            <a href="<?php echo base_url('admin/isEnabled-product/')?><?php echo $shoe['id'] ?>" class="btn btn-sm btn-dark" >
                                <?= $shoe['isEnabled'] ? "<i class='bi bi-lock'></i>"  : "<i class='bi bi-unlock'></i>" ?>  
                            </a>
                        </td>

                    </tr>
                <?php endforeach; ?>
                
            </tbody>
        </table>
        
    </div>
</div>




<div class="modal fade " id="edit" tabindex="-1" aria-labelledby="editLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content container">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editLabel" >Shoe with betsy</h1>
        <button type="button" class="btn-close btn-ligth" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
    
      <div class="modal-body">
        <div class="container-fluid">
            <div class="row">
                <div id="imgShoe" class="col-12 col-md-4" style="height: 50vh; ; background-size: contain; background-position: center; background-repeat: no-repeat"></div>
                <div class="col-12 col-md-8 d-flex justify-content-between flex-column" style="height: 50vh; overflow: auto;">
                    <h3 class="display-6 border-bottom" id="titleShoe" style="text-transform: uppercase; max-width: 100vw; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">ADIDAS YEZZY</h3>
                    <p style="max-height:40vh; overflow: auto; text-align: justify" id="descriptionShoe"> 
                        El TWO WXY v2 está diseñado para un juego sin posiciones que impacta hasta el último centímetro de la cancha. Se ha aplicado una combinación de tecnologías de amortiguación y retorno de energía de alt
                    </p>


                    <table class="table">
                        <thead class="bg-dark text-light">
                            <tr>
                                <th scope="col">Stock/MinStock</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Categoria</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><span id="stockShoe"></span>/<span id="minstockShoe"></span></td>
                                <td>$<span id="priceShoe"></span></td>
                                <td><span id="categoryShoe" style="text-transform: uppercase"></span></td>
                            </tr>
                        </tbody>
                    </table>
            
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

<script>
    const titleShoes = document.querySelectorAll('#titleShoes');
    titleShoes.forEach(item =>  {
        item.addEventListener('click', (e) => {
            document.querySelector('#imgShoe').style.backgroundImage =  `url(<?php echo base_url('public/uploads/')?>${e.target.dataset['img']})`;
            document.querySelector('#titleShoe').textContent =   e.target.dataset['title'];
            document.querySelector('#descriptionShoe').textContent =   e.target.dataset['description'];
            document.querySelector('#priceShoe').textContent =   e.target.dataset['price'];
            document.querySelector('#minstockShoe').textContent =   e.target.dataset['minstock'];
            document.querySelector('#stockShoe').textContent =   e.target.dataset['stock'];
            document.querySelector('#categoryShoe').textContent =   e.target.dataset['category'];
        })
    })
</script>
   