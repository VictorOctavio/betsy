<?php $validation = \Config\Services::validation(); ?>

<?php 
    include 'app/Views/front/components/handleMsg.php';
?>

<div class="login">
  <div class="login__wrapper container">

    <img alt="s" src="assets/images/signin.png" class="login__wrapper__svg"></img>
    
    <div class="login__wrapper__form col-12 col-xl-9">
      <h3 class="login__wrapper__form__title">Iniciar Sesion</h3>
      <form method="post" action="<?php echo base_url('/signin-send') ?>">
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
              placeholder="example@gmail.com">
          </div>

          <div class="mb-2">
            <label style="font-size:14px" for="password" class="form-label d-flex justify-content-between">Password 
            <?php if ($validation->getError('password')) { ?>
              <span class='text-danger mx-2' style="font-size: 12px;">
                <?= $error = $validation->getError('password'); ?>
              </span>
            <?php } ?>
            </br>

            <a href="<?php echo base_url('restore-password') ?>" class="text-info text-sm" style="font-size: 11px">¿Ovidaste tu clave?</a>

            </label>
            <input name="password" type="password" class="form-control" placeholder="Contraseña">
  
          </div>
          <input type="submit" value="Iniciar Sesión" class="btn btn-dark my-3">        
        </div>
      </form>

      <a href="<?php echo base_url('signup') ?>" class="text-dark text-sm">¿No tienes cuenta?</a>
            </br>
    </div>
 
  </div>
</div>