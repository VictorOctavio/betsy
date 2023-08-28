<div class="products">
   <div class="products__wrapper container">

      <div class="products__wrapper__filters">
         <h3 class="default__title" id="filter">Filtros <i class="bi bi-sort-down"></i></h3>
         <div class="products__wrapper__filters__item active" id="filters">

            <div class="products__wrapper__filters__item__list">
               <h3 class="default__title">Style</h3>
               
               <a id="removeFiltros" href="<?php echo base_url('products') ?>" class="btn-sm btn btn-dark w-50 my-2 d-none" title="deshacer filtros">
                  <i class="bi bi-backspace-fill"></i> Filtros
               </a>

               <div class="products__wrapper__filters__item__list__div">
                  <a id="item-list" onclick="handleSearchParams('category', 4)" class="products__wrapper__filters__item__list__div__item">Casual
                     </a>
                  <a id="item-list" onclick="handleSearchParams('category', 2)" class="products__wrapper__filters__item__list__div__item">Sport
                     </a>
                  <a id="item-list" onclick="handleSearchParams('category', 5)" class="products__wrapper__filters__item__list__div__item">Limited</a>

                  <a id="item-list" onclick="handleSearchParams('category', 3)" class="products__wrapper__filters__item__list__div__item">Street</a>
                     
                  <a id="item-list" onclick="handleSearchParams('category', 1)" class="products__wrapper__filters__item__list__div__item">Urban
                     </a>
               </div>
            </div>

            <div class="products__wrapper__filters__item__list">
               <h3 class="default__title">Marca</h3>
               <div class="products__wrapper__filters__item__list__div">
                  <a id="item-list" onclick="handleSearchParams('brand', 'puma')"  class="products__wrapper__filters__item__list__div__item">Puma
                     
                  </a>
                  <a id="item-list" onclick="handleSearchParams('brand', 'nike')"  class="products__wrapper__filters__item__list__div__item">Nike
                     </a>
                  <a id="item-list"onclick="handleSearchParams('brand', 'adidas')"  class="products__wrapper__filters__item__list__div__item">Adidas
                     </a>
                  <a id="item-list" onclick="handleSearchParams('brand', 'new balance')"  class="products__wrapper__filters__item__list__div__item">New Balance
                     </a>
                     <a id="item-list" onclick="handleSearchParams('brand', 'reebok')"  class="products__wrapper__filters__item__list__div__item">Reebok
                     </a>
               </div>
            </div>

            <div class="products__wrapper__filters__item__list">
               <h3 class="default__title">Sexo</h3>
               <div class="products__wrapper__filters__item__list__div">
                  <a id="item-list" onclick="handleSearchParams('gender', '1')"  class="products__wrapper__filters__item__list__div__item">Hombre  
                  </a>
                  <a id="item-list" onclick="handleSearchParams('gender', '2')" class="products__wrapper__filters__item__list__div__item">Mujer
                  </a>
                  <a id="item-list" onclick="handleSearchParams('gender', '3')" class="products__wrapper__filters__item__list__div__item">Unisex
                  </a>
               </div>
            </div>


          <div class="products__wrapper__filters__item__list">
               <h3 class="default__title mb-2">Precio</h3>
               <form>
                  <input placeholder="min" name="minPrice" type="number" value="100">
                  <input class="my-2" placeholder="maxPrice" name="maxPrice" type="number" value="1000">
                  <button type="submit" class="btn btn-dark btn-sm btn-block d-block"><i class="bi bi-filter-left"></i>Filtrar</button>
               </form>
            </div>
      
         </div>
      </div>

      <div class="products__wrapper__items">

         <div class="products__wrapper__items__settings">
            <h3 class="default__title"><?php echo(count($shoes))?> Productos Encontrados</h3>
       
            <div class="dropdown">
               <button class="btn btn-danger dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Ordenar
               </button>
               <ul class="dropdown-menu">
                  <li><a onclick="handleSearchParams('orderByPrice', 'DESC')" class="dropdown-item">Mayor a Menor Precio</a></li>
                  <li><a  onclick="handleSearchParams('orderByPrice', 'ASC')" class="dropdown-item">Menor a Mayor Precio</a></li>
                  <li><a  onclick="handleSearchParams('sale', 'true')" class="dropdown-item">Ofertas</a></li>
               </ul>
            </div>

         </div>

         <div class="products__wrapper__items__cards" >

            <?php foreach($shoes as $shoe): ?>
               
               <?php $isDisabled = ($shoe['stock'] - $shoe['minstock'] <= 0); ?>

               <div class="mycard <?= ($isDisabled) ? 'disabled':'' ?>" 
                  onclick="getProduct(<?php echo !$isDisabled ?>, <?php echo $shoe['id'] ?>)">
                  <div class="mycard__header">
                     <span class="mycard__header__betsy">betsy</span>
                  </div>
                  <div 
                  data-img1="<?php echo base_url('public/uploads/')?><?php echo explode(',',$shoe['imagesURL'])[0]?>" 
                  data-img2="<?php echo base_url('public/uploads/')?><?php echo explode(',',$shoe['imagesURL'])[1]?>" class="mycard__body" 
                  style="background-image: url(<?php echo base_url('public/uploads/')?><?php echo explode(',',$shoe['imagesURL'])[0]?>);"  id="mycardimg"></div>
                  <div>
                     <div class="mycard__footer">
                        <h3 class="mycard__footer__title m-0"><?php echo($shoe['title'])?></h3>

                        <p class="mycard__footer__price mb-0">$ <?php echo $shoe['price'] - ($shoe['price'] * ($shoe['sale']/100)) ?>
                            USD
                        </p>

                     </div>
                  </div>
               
               <?php if ($shoe['sale'] > 0 ):  ?>
                  <div class="mycard_sale">🔥 %<?php echo($shoe['sale'])?> OFF</div>
               <?php endif ?>     

               <?php if (($shoe['stock'] - $shoe['minstock'] <= 0)):  ?>
                  <div class="mycard_sale agotado">🚫 SIN STOCK</div>
               <?php endif ?>  
              
               </div>  
            <?php endforeach; ?>
            
         </div>
         
        <!--<nav class="mt-5">
            <ul class="pagination justify-content-center">
               <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
               </li>
               <li class="page-item"><a class="page-link text-danger" href="#">1</a></li>
               <li class="page-item"><a class="page-link text-danger" href="#">2</a></li>
               <li class="page-item"><a class="page-link text-danger" href="#">3</a></li>
               <li class="page-item">
                  <a class="page-link text-danger" href="#">Next</a>
               </li>
            </ul>
         </nav> -->
      </div>

   </div>
</div>


<script>

   if(window.location.search.length > 0){
     document.querySelector('#removeFiltros').classList.remove('d-none')
   }

   const handleSearchParams = (name, value) => {
      let url = new URL(window.location.href);
      
      if (url.searchParams.getAll(name).length > 0) url.searchParams.set(name,value);
      else url.searchParams.append(name, value);;

      window.location.href = url.href;
   }

   const getProduct = (disabled, id) => {
      window.location.href = `<?php echo base_url('products/')?>${id}`
   }

</script>