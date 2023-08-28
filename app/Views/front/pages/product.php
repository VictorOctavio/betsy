<div class="product">

   <div class="product__wrapper container" >

      <div class="product__wrapper__main">
         <div class="product__wrapper__main__images">
            
            <div class="product__wrapper__main__images__galery">
               <?php foreach(explode(',',$shoe['imagesURL']) as $img): ?>
                  <img id="galery-img" src="<?php echo base_url('public/uploads/')?><?php echo($img)?>" alt="img2" width="50">
                <?php endforeach; ?>
            </div>

            <div class="product__wrapper__main__images__active" id="img-active"
               style="background-image: url(<?php echo base_url('public/uploads/')?><?php echo explode(',',$shoe['imagesURL'])[0]?>)"
            ></div>
         
         </div>

         <div class="product__wrapper__main__description">
            
            <h2 class="m-0 product__wrapper__main__description__title">
               <?php echo ($shoe['title']); ?>
            </h2>
            
            <div class="m-0 product__wrapper__main__description__info">
               <h6 class="mb-0 product__wrapper__main__description__info__title">Descripción</h6>
               <p class="mb-0 product__wrapper__main__description__info__text"><?php echo ($shoe['description']); ?></p>
               
            </div>

            <div class="product__wrapper__main__price">
               <h3>$
             
               <?php  echo $shoe['price'] - ($shoe['price'] * ($shoe['sale']/100)) ?> USD
               <?php if($shoe['sale'] >0) {; ?>
                  <span style="font-size: 14px; text-decoration: line-through; color: crimson;">Antes: <i><?php echo $shoe['price'] ?></i></span>
               <?php } ?>
            </h3> 
               <div class="product__wrapper__main__price__btns">
                  <button id="finishBuy" class="btn btn-success">Comprar</button>
                  <button  id="comments" class="btn btn-outline-info" style="" type="submit" ><i class="bi bi-wechat"></i></button>
               </div>
            </div>
            
            <div id="finishBuyDiv" class="product__wrapper__main__description__more">
               <h2 class="m-0 product__wrapper__main__description__title" style="color: white">
                  <?php echo ($shoe['title']); ?>
               </h2>

               <form class="w-100 mt-4" method="post" action="<?php echo base_url('user/add-cart')?>">
                  <div class="row">
                     <div class="col">
                        <label for="inputState">Talla</label>
                        <select id="inputState" class="form-control" name="size">
                           <?php foreach(explode(',',$shoe['sizes']) as $size): ?>
                              <option value="<?php echo $size ?>"><?php echo $size ?></option>
                           <?php endforeach; ?>
                        </select>
                     </div>
                     <div class="col">
                        <label for="inputState">Cantidad</label>
                        <select id="inputState" class="form-control" name="qty">
                           <?php for ($i = 1; $i < $shoe['stock']; $i++) : ?>
                              <option value="<?php echo $i ?>"><?php echo $i ?></option>
                           <?php endfor; ?>
                        </select>
                     </div>

                     <input type="hidden" value="<?php  echo $shoe['title'] ?>" name="name"/>
                     <input type="hidden" value="<?php  echo $shoe['id'] ?>" name="id"/>
                     <input type="hidden" value=" <?php  echo $shoe['price'] - ($shoe['price'] * ($shoe['sale']/100)) ?>" name="price"/>
                     <input type="hidden" value="<?php echo explode(',',$shoe['imagesURL'])[0]?>" name="imgURL"/>
                  </div>
                  
                  <span class="product__wrapper__main__description__more__betsy">betsy</span>
                  <span id="finishBuyBack" class="product__wrapper__main__description__more__back"><i class="bi bi-arrow-left"></i></span>
                  <button class="btn w-100 btn-block mt-3 btn-success" style="color: #fff" type="submit" >Confirmar Compra</button>
               </form>
            </div>


            <div id="commentsDiv" class="product__wrapper__main__description__more product__wrapper__main__description__more--comments">
               
               <div class="product__wrapper__main__description__more__comments">
               
               <?= count($comments) <= 0 ?'<p class="mt-5" style="text-align: center">Sé el primero en dejar un comentario. Equipo betsy</p>':'' ?>
               
                  <?php foreach($comments as $comment): ?>
                     <div class="product__wrapper__main__description__more__comments__item"> 

                        <div class="d-flex justify-content-between align-items-center">
                        
                           <div class="d-flex gap-1 align-items-center" style="font-weight: bold">
                              <img src="<?php echo base_url('public/uploads/'). $comment['avatar'] ?>"
                              style="object-fit: cover; border-radius: 50%; width: 30px; height: 30px">

                              <p class="m-0" style="font-size: 12px; text-decoration: underline; min-width: 100%">
                                 <?php echo $comment['firstname'].' '.$comment['lastname'] ?>
                              </p>
                           </div>


                              <?php if($comment['userId'] == session()->get('id') OR session()->get('isAdmin') ) {; ?>
                                 <a href="<?php echo base_url('user/remove-comment/').$comment['commentId'] ?>" style="text-decoration: none; color: crimson"><i class="bi bi-x"></i></a>
                              <?php } ?>
                              <span style="font-size: 14px">14/04/2021
                           </span>
                        </div>         
                        
                        <div style="max-height: 60px; overflow: auto;" class="mt-1">
                           <p class="m-0 w-100" style="font-size: 14px; text-align: justify;"><?php echo $comment['message'] ?></p>
                        </div>
                     </div>
                  <?php endforeach; ?>
               </div>
                  
                     
                  <?php if(!session()->get('logged_in')) {; ?>
                     <p class='mt-5' style='text-align: center'>Necesitas iniciar session para comentar<br/><a href="<?php echo base_url('signin') ?>">LOGIN</a></p>
                  <?php } ?>
               
                  <div class="d-flex flex-start gap-1 <?= session()->get('logged_in') ? '' : 'd-none' ;?>" > 
                     <img src="<?php echo base_url('public/uploads/').session()->get('avatar') ?>" alt="avatar"  height="50" clss="mt-2" width="50" style="object-fit: cover; border-radius: 50%"/>
                  
                     <form class="w-100" style="position: relative" method="post" action="<?php echo base_url('user/comment/').$shoe['id'] ?>">
                           <h5 style="font-size: 13px" class="text-white my-0 mx-1">Añadir comentario</h5>
                           <textarea name="message" style="min-height: 70px; max-height: 70px" class="form-control" placeholder="Dejar comentario: "></textarea>
                           <button type="submit" class="btn btn-info btn-sm mt-1" style="position: absolute; top: 60%; right: 0"><i class="bi bi-send-fill"></i></button>
                     </form>
                  </div>
                  <span class="product__wrapper__main__description__more__betsy">betsy</span>
                  <span id="commentsBack" class="product__wrapper__main__description__more__back"><i class="bi bi-arrow-left"></i></span>
            </div>
            
         </div>
      </div>
   </div>
</div>


<script>
   const finishBuy = document.querySelector('#finishBuy');
   const finishBuyBack = document.querySelector('#finishBuyBack');
   const finishBuyDiv = document.querySelector('#finishBuyDiv');
   const comments = document.querySelector('#comments')
   const commentsDiv = document.querySelector('#commentsDiv');
   let toastCart = document.getElementById('toast-cart');
   let btnCloseToastCart = document.getElementById('btn-close-toast');
   const commentsBack = document.querySelector('#commentsBack');

   finishBuy.addEventListener('click', e => {
      finishBuyDiv.classList.add('active');
   })

   comments.addEventListener('click', e => {
      commentsDiv.classList.add('active');
   })

   finishBuyBack.addEventListener('click', e => {
      finishBuyDiv.classList.remove('active');
   })

   commentsBack.addEventListener('click', e => {
      commentsDiv.classList.remove('active');
   })
 
   btnCloseToastCart.addEventListener('click', function(){
      toastCart.classList.remove('d-block');
      toastCart.classList.add('bg-dark');
   })
</script>
