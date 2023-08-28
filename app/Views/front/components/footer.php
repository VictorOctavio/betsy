
<?php $validation = \Config\Services::validation(); ?>


<?php 
    include 'app/Views/front/components/handleMsg.php';
?>

<footer class="text-white text-center text-md-start"
    style="background-color: var(--bgcolor);">
 
     <div class="container p-4">
     
       <div class="row">
    
         <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
           <h5 class="text-uppercase text-white">Sólo hazlo</h5>
 
           <p class="text-secondary">
               Sólo el 2% de la población sabe lo que quiere y cómo lo va a conseguir ¿y tú?
           </p>
         </div>
        
         <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
           <h5 class="text-uppercase text-white">Betsy</h5>
 
           <ul class="list-unstyled mb-0">
            <li>
              <a href="<?php echo base_url('preguntasfrecuentes');?>" class="text-secondary">Preguntas Frecuentes</a>
            </li>

            <li>
              <a href="<?php echo base_url('terminosycondiciones');?>" class="text-secondary">términos y condiciones</a>
            </li>
           </ul>
         </div>
      
         <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
           <h5 class="text-uppercase mb-0 text-white">Contacto</h5>
 
           <ul class="list-unstyled">
             <li>
               <p class="text-white m-0 my-1" style="cursor: pointer"  data-bs-toggle="modal" data-bs-target="#msg" >Dejar Mensaje</p>
             </li>
             <li>
               <a href="https://www.instagram.com/nike" target="_black" class="text-white">Instragram</a>
             </li>
             <li>
               <a href="https://twitter.com/Nike" target="_black" class="text-white">Twiteer</a>
             </li>
            <li>
              <a href="https://www.tiktok.com/@nike" target="_black" class="text-white">Tiktok</a>
            </li>
           </ul>
         </div>
       </div>

     </div>


     <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
       © 2023 Copyright:
       <a class="text-white" href="<?php echo base_url('') ?>">Betsy.com</a>
     </div>
   
   </footer>

   
<div class="modal fade" id="msg" tabindex="-1" aria-labelledby="msgLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="msgLabel">Nuevo Mensaje</h1>
        <button type="button" class="btn-close btn-ligth" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form class="modal-body" method="post" action="<?php echo base_url('/send-email') ?>">
        <div class="d-flex gap-2">
          <input  name="para" class="form-control d-none" value="user4@user4.com" type="text" placeholder="Titulo: ">
          <input  name="title" class="form-control" type="text" placeholder="Titulo: ">
         
          <input
            value="<?php echo session()->get('email') ?>"
          name="email" class="form-control" type="email" placeholder="Email: ">
        </div>  

        <textarea name="msg" class="col-12 mt-3 form-control" style="max-height: 300px;" placeholder="Consulta"></textarea>

        <button type="submit" class="btn btn-dark btn-block mt-2 w-100">Enviar</button>
      </form>
    </div>
  </div>
</div>

</body>
   
</html>