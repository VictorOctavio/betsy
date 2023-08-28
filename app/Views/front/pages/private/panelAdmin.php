<div class="panelAdmin" id="panelAdmin">
        <div class="panelAdmin__wrapper">
            <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex">
                <a href="<?php echo base_url('/'); ?>" title="volver" class="btn btn-danger  btn-sm">Volver</a>
                <button id="btnClosePanel" class="mx-1 btn btn-dark btnclose__mobile">❌</button>
            </div>    
            
                <h3 class="panelAdmin__title">BETSY</h3>
            </div>
            <div class="panelAdmin__wrapper__items mt-3">
            <a class="panelAdmin__wrapper__items__item" href="<?php echo base_url('/admin'); ?>"><i class="bi bi-house"></i> Home</a>
                <a class="panelAdmin__wrapper__items__item" href="<?php echo base_url('/admin/new-product'); ?>"><i class="bi bi-plus"></i> Producto</a>
                <a class="panelAdmin__wrapper__items__item" href="<?php echo base_url('/admin/products'); ?>"><i class="bi bi-list-ol"></i> Productos</a>
                <a class="panelAdmin__wrapper__items__item" href="<?php echo base_url('/admin/messages'); ?>"><i class="bi bi-envelope-check"></i> Mensajes</a>
                <a class="panelAdmin__wrapper__items__item" href="<?php echo base_url('/admin/users'); ?>"><i class="bi bi-people"></i> Usuarios</a>
            </div>
            <div class="panelAdmin__wrapper__config">
                <div class="panelAdmin__wrapper__config__info">
                    <img class="panelAdmin__wrapper__config__info__img" src="<?php echo base_url('public/uploads/').session()->get('avatar'); ?>" data-bs-toggle="modal" data-bs-target="#showUser"  id="showDataAdmin" alt="avatar-admin"
                    data-fullname="<?php echo session()->get('fullname')?>" data-nickname="<?php echo session()->get('nickname')?>" data-email="<?php echo session()->get('email')?>"
                        data-avatar="<?php echo session()->get('avatar')?>"
                        data-fecha="<?php echo session()->get('createdAt')?>"
                        data-rol="<?php echo session()->get('isAdmin')?>"
                        />
                    <h6 class="panelAdmin__title" style="text-transform: capitalize"><?php echo session()->get('nickname')?></h6>
                </div>
                <a class="btn btn-danger" title="salir"  href='<?php echo base_url('logout') ?>'><i class="bi bi-box-arrow-left"></i></a>
            </div>
        </div>
    </div>

<div class=" panelAdminMobile">
    <button  id="btnOpenPanel" class="btn btn-dark" style="border-radius: 50%">
        <i class="bi bi-filter-circle-fill"></i>
    </button>
</div>

<script>
      const showDataAdmin = document.querySelector('#showDataAdmin');
       showDataAdmin.addEventListener('click', e => {
                console.log(e.target.dataset['createdAt'])
                document.querySelector('#inputFullname').textContent = e.target.dataset['fullname']
                document.querySelector('#inputNickname').textContent = e.target.dataset['nickname']
                document.querySelector('#inputEmail').textContent = e.target.dataset['email']
                document.querySelector('#userAvatar').setAttribute('src', `<?php echo base_url('') ?>/public/uploads/${e.target.dataset['avatar']}`);
                document.querySelector('#inputRol').textContent = e.target.dataset['rol'] ? 'Admin' : 'User';
                document.querySelector('#inputCreatedAt').textContent = e.target.dataset['fecha']
       })
</script>
