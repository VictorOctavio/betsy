<?php $validation = \Config\Services::validation(); ?>

<?php 
    include 'app/Views/front/components/handleMsg.php';
?>

<div class="login">
  <div class="login__wrapper container">

    <img alt="s" src="assets/images/signin.png" class="login__wrapper__svg"></img>
    
    <div class="login__wrapper__form col-12 col-xl-9">
      <h3 class="login__wrapper__form__title">Recuperar Cuenta</h3>
      <form method="post" action="<?php echo base_url('/restore-password') ?>">
        <div class="card-body" media="(max-width:768px)">
          

          <div class="mb-2">
            <label style="font-size:14px" for="email" class="form-label">Email

            <?php if ($validation->getError('email')) { ?>
              <span class='text-danger mx-2' style="font-size: 12px;">
                <?= $error = $validation->getError('email'); ?>
              </span>
            <?php } ?>
            </label>
            <input name="email" type="email" class="form-control" value="<?php echo set_value('email') ?>"
              placeholder="email@email.com">
          </div>

          
          <div class="mb-2">
            <label style="font-size:14px" for="favoritePet" class="form-label d-flex justify-content-between">Mascota Favorita 
              <?php if ($validation->getError('favoritePet')) { ?>
                <span class='text-danger mx-2' style="font-size: 12px;">
                  <?= $error = $validation->getError('favoritePet'); ?>
                </span>
              <?php } ?>
              </br>
            </label>
            <input name="favoritePet" type="text" class="form-control" placeholder="Mascota">
          </div>


          <div class="mb-2">
            <label style="font-size:14px" for="favoriteColor" class="form-label d-flex justify-content-between">Color Favorito
              <?php if ($validation->getError('favoriteColor')) { ?>
                <span class='text-danger mx-2' style="font-size: 12px;">
                  <?= $error = $validation->getError('favoriteColor'); ?>
                </span>
              <?php } ?>
              </br>
            </label>
            <input name="favoriteColor" type="text" class="form-control" placeholder="Color">
          </div>

        </div>


          <div class="mb-2">
            <label style="font-size:14px" for="password" class="form-label d-flex justify-content-between">Nueva Clave
            <?php if ($validation->getError('password')) { ?>
              <span class='text-danger mx-2' style="font-size: 12px;">
                <?= $error = $validation->getError('password'); ?>
              </span>
            <?php } ?>
            </br>
            </label>
            <input name="password" type="password" class="form-control" placeholder="Contraseña">
          </div>
        
          <input type="submit" value="Recuperar Cuenta" class="btn btn-dark my-3">        

      </form>
      <a href="<?php echo base_url('signup') ?>" class="text-dark text-sm">¿No tienes cuenta?</a>
            </br>
    </div>
 
  </div>
</div>