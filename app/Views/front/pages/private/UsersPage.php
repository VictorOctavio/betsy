<div class="dashboard">

    <?php 
        include "panelAdmin.php";
    ?>

    <div style="background-color: #fff; padding: 30px 50px; max-height: 96vh; overflow: auto; width: 100%">
        <table class="table">
            <thead class="thead-dark bg-dark text-white">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <th scope="row">
                        <img src="<?php echo base_url('public/uploads/').$user['avatar']?>" alt="" width="40" height="40" style="object-fit: cover; border-radius: 50%"/>
                    </th>

                    <!-- Data user -->
                    <td  
                        data-fullname="<?php echo $user['firstname'].' '.$user['lastname'] ?>"  data-nickname="<?php echo $user['nickname']?>" data-email="<?php echo $user['email']?>"
                        data-avatar="<?php echo $user['avatar']?>"
                        data-rol="<?php echo $user['rol_id']?>"
                        data-date="<?php echo $user['createdAt']?>"
                        id="showDataUser" data-bs-toggle="modal" data-bs-target="#showUser" style="max-width: 28vw; cursor: pointer; text-decoration: underline">
                        <?php echo $user['firstname'].' '.$user['lastname'] ?>
                    </td>

                    <td style="overflow: hidden; text-overflow: ellipsis; max-width: 45vw; white-space: nowrap;"><?php echo $user['email'] ?></td>
                    <td class="d-flex gap-1">

                        <?php if (session()->get('isMainAdmin')):  ?>
                            <a href="<?php echo base_url('admin/change-state-rol/') ?><?php echo $user['id']?>" class="btn btn-dark" title="Admin" >
                                <?= ($user['rol_id'] == 1 OR $user['rol_id'] == 3) ? '<i class="bi bi-incognito"></i>' : '<i class="bi bi-person-fill"></i>' ?> 
                            </a>
                        <?php endif ?>  

                        <?php if ($user['isBloqued']):  ?>
                            <a href="<?php echo base_url('admin/change-state-block/') ?><?php echo $user['id']?>" class="btn btn-success" title="desbloquear"  data-toggle="modal" data-target=".bd-example-modal-lg"><i class="bi bi-unlock-fill"></i></a>
                        <?php endif ?>  
                        
                        <?php if (!$user['isBloqued']):  ?>
                            <a href="<?php echo base_url('admin/change-state-block/') ?><?php echo $user['id']?>" class="btn btn-danger" title="bloquear"  data-toggle="modal" data-target=".bd-example-modal-lg"><i class="bi bi-lock-fill"></i></a>
                        <?php endif ?>  
                    </td>
                </tr>
            <?php endforeach; ?>
                
            </tbody>
        </table>
    </div>
</div>


<script>
      const showDataUser = document.querySelectorAll('#showDataUser');
        showDataUser.forEach(element => {
            element.addEventListener('click', e => {
                document.querySelector('#inputFullname').textContent = e.target.dataset['fullname']
                document.querySelector('#inputNickname').textContent = e.target.dataset['nickname']
                document.querySelector('#inputEmail').textContent = e.target.dataset['email']
                document.querySelector('#userAvatar').setAttribute('src', `<?php echo base_url('') ?>/public/uploads/${e.target.dataset['avatar']}`);
                document.querySelector('#inputRol').textContent = e.target.dataset['rol'] === '1' ? 'Admin' : 'User';
                document.querySelector('#inputCreatedAt').textContent = e.target.dataset['date'];
            })
        });
</script>