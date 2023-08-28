<?php $validation = \Config\Services::validation(); ?>


<div class="account">
   <div class="acoount__wrapper container">
      <h3 class="account__wrapper__title">
         Mi Cuenta
      </h3> 

      <form class="account__wrapper__form" method="post" action="<?php echo base_url('/user/update-user') ?>"  enctype="multipart/form-data">
         
      <div class="account__wrapper__form__avatar">
            <img class="account__wrapper__form__avatar__img" src="public/uploads/<?php echo $user['avatar'] ?>" alt="avatar"/>
            <input name="avatar" type="file" class="account__wrapper__form__avatar__input" />
       </div>
       
         <div class="row mb-4">
            <div class="col">
               <div class="form-outline">
                  <label class="form-label" for="form6Example1">First name
                     <?php if ($validation->getError('firstname')) { ?>
                        <span class='text-danger mx-2' style="font-size: 12px;">
                           <?= $error = $validation->getError('firstname'); ?>
                        </span>
                     <?php } ?>
                  </label>
                  <input name="firstname" value="<?php echo $user['firstname'] ?>" type="text" id="form6Example1" class="form-control" />
             </div>
            </div>
            <div class="col">
               <div class="form-outline">
                  <label class="form-label" for="form62">Last name
                     <?php if ($validation->getError('lastname')) { ?>
                        <span class='text-danger mx-2' style="font-size: 12px;">
                           <?= $error = $validation->getError('lastname'); ?>
                        </span>
                     <?php } ?>
                  </label>
                  <input name="lastname"  value="<?php echo $user['lastname'] ?>"  type="text"  class="form-control" />
               </div>
            </div>
         </div>

         <div class="form-outline mb-4">
            <label class="form-label" for="form63">Nickname
                <?php if ($validation->getError('nickname')) { ?>
                        <span class='text-danger mx-2' style="font-size: 12px;">
                           <?= $error = $validation->getError('nickname'); ?>
                        </span>
               <?php } ?>
            </label>
            <input  name="nickname"  value="<?php echo $user['nickname'] ?>"  type="text"  class="form-control" />
         </div>


         <div class="form-outline mb-4">
            <label class="form-label" for="form64">Address
               <?php if ($validation->getError('address')) { ?>
                        <span class='text-danger mx-2' style="font-size: 12px;">
                           <?= $error = $validation->getError('address'); ?>
                        </span>
               <?php } ?>
            </label>
            <input name="address"  value="<?php echo $user['address'] ?>"  type="text"  class="form-control" />
         </div>

         <div class="form-outline mb-4">
            <label class="form-label" for="form65">Email
               <?php if ($validation->getError('email')) { ?>
                        <span class='text-danger mx-2' style="font-size: 12px;">
                           <?= $error = $validation->getError('email'); ?>
                        </span>
               <?php } ?>

            </label>
            <input name="email"   value="<?php echo $user['email'] ?>"  type="email"  class="form-control" disabled/>
         </div>

         <div class="form-outline mb-4">
            <label class="form-label" for="form66">Phone
               <?php if ($validation->getError('phone')) { ?>
                        <span class='text-danger mx-2' style="font-size: 12px;">
                           <?= $error = $validation->getError('phone'); ?>
                        </span>
               <?php } ?>
                  
            </label>
            <input name="phone"   value="<?php echo $user['phone'] ?>"  type="text"  class="form-control" />
         </div>

         <div class="form-outline mb-4">
            <label class="form-label" for="form67">Additional information</label>
            <textarea class="form-control" id="form67" rows="4"></textarea>
         </div>
         
         <button class="btn btn-light" type="button" style="border: 1px solid #ccc" data-bs-toggle="modal" data-bs-target="#seguridadUser">
            Opciones de seguridad
         </button>

         <button class="btn btn-dark" type="button" style="border: 1px solid #ccc" data-bs-toggle="modal" data-bs-target="#passwordUser">
            <i class="bi bi-key-fill"></i>
         </button>

   

         <div class="form-check d-flex justify-content-center mb-4">
            <input class="form-check-input me-2" type="checkbox" value="" id="form68" checked />
            <label class="form-check-label" for="form68"> Deseas Recibír notificaciones? </label>
         </div>

         <button type="submit" class="btn btn-block mb-4 text-white" style="background-color: crimson">Guarda Cambios</button>

      </form>
   </div>
</div>



<div class="modal fade" id="passwordUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content p-3"  method="post" action="<?php echo base_url('/restore-password') ?>">

      <div class="modal-header">  
         <h3>Actualizar Clave</h3>
      </div>

      <input name="email" type="hidden" class="form-control" value="<?php echo session()->get('email') ?>" >
   
      <div class="form-group mt-3">
         <small style="font-size: 12px" class="form-text text-muted">Actualizar Password</small>
         <input name="password" type="password" class="form-control" placeholder="Nueva contraseña">
      </div>

      <div class="form-group mt-3">
         <small style="font-size: 12px" class="form-text text-muted">Cual es tu animal favorito?</small>
            <input name="favoritePet" type="text" class="form-control" placeholder="Cual es tu animal favorito?">
      </div>

      <div class="form-group mt-3">
         <small style="font-size: 12px" class="form-text text-muted">Cual es tu color favorito?</small>
            <input name="favoriteColor" type="text" class="form-control" placeholder="Cual es tu animal favorito?"> 
      </div>
      
      <input type="submit" class="btn btn-danger my-3" value="Guarda Cambios" />

   </form>
  </div>
</div>




<div class="modal fade" id="seguridadUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <form class="modal-content p-3" method="post" action="<?php echo base_url('user/update-questions') ?>">

      <div class="modal-header">
         <h3>Seguridad de Cuenta</h3>
      </div>

      <div class="form-group mt-3">
         <small style="font-size: 12px" class="form-text text-muted">Cual es tu animal favorito?</small>
         <?php if ($question) { ?>
            <input value="<?php echo $question['favoritePet'] ?>" name="favoritePet" type="password" class="form-control" placeholder="Cual es tu animal favorito?">
         <?php } else { ?>
            <input name="favoritePet" type="password" class="form-control" placeholder="Cual es tu animal favorito?">
         <?php } ?>  
      </div>

      <div class="form-group mt-3">
         <small style="font-size: 12px" class="form-text text-muted">Cual es tu color favorito?</small>
         <?php if ($question) { ?>
            <input value="<?php echo $question['favoriteColor'] ?>" name="favoriteColor" type="password" class="form-control" placeholder="Cual es tu animal favorito?">
         <?php } else { ?>
            <input name="favoriteColor" type="password" class="form-control" placeholder="Cual es tu animal favorito?">
         <?php } ?>  
      </div>
      
      <input type="submit" class="btn btn-danger my-3" value="Guarda Cambios" />

   </form>
  </div>
</div>