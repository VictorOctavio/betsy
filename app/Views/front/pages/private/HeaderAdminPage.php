<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Betsy -Admin-</title>

     <!-- Bootstrap css -->
     <link href="<?php echo base_url('assets/css/bootstrap.min.css')?>" rel="stylesheet">

     <!-- Styles css -->
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/variables.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/card.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/loginAdmin.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/panelAdmin.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/dashboard.css')?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/styles/newproduct.css')?>">
    
    <!-- Scripts -->
    <script src="<?php echo base_url('assets/js/admin.js')?>"></script>

    <script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?> "></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <script src="<?php echo base_url('assets/js/chart.js')?>"></script>
    <script src="<?php echo base_url('assets/js/chartscript.js')?>"></script>
    
</head>
<body>
    




    <div class="modal fade " id="showUser" tabindex="-1" aria-labelledby="showUserLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="showUserLabel"><i class="bi bi-person-bounding-box"></i> User </h1>
                <button type="button" class="btn-close btn-ligth" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            
            <div class="d-flex justify-content-center align-items-center gap-3 my-5">
                <img  id="userAvatar" style="width: 200px; height: 250px; object-fit: cover" src="" alt="ale"/>

                <div>
                    <ul class="list-group">
                        <li class="list-group-item active bg-dark">Datos Personales</li>
                        <li class="list-group-item">Nombre: <span id="inputFullname"></span></li>
                        <li class="list-group-item">Nickname:  <span id="inputNickname"></span</li>
                        <li class="list-group-item">Email:  <span  id="inputEmail"></span></li>
                        <li class="list-group-item">Rol: <span id="inputRol"></span></li>
                        <li class="list-group-item">Se unio: <span  id="inputCreatedAt"></span></li>
                    </ul>
                </div>
            </div>
                
            </div>
            </div>
        </div>
    </div>

</body>
</html>