<div class="header">
   <div class="header__wrapper container">

      <div class="header__wrapper__text">
         <div class="header__wrapper__text__title">Sé tu mismo</div>
         <div class="header__wrapper__text__subtitle">La persona que dijo ganar no lo es todo, nunca ganó nada.<span class="text-secondary header__wrapper__text__subtitle__author"> Mia Hamm</span></div>
         <div class="header__wrapper__text__betsy">betsy</div>
      </div>
      
      <object class="shoe__svg" data="assets/images/svg-shoe.svg" width="50" height="50"></object>
   </div>
</div>


<div class="slider">
   <div class="slide-track">
       <div class="slide">
           <img src="assets/images/marcas/adidas.png" alt="">
       </div>
       
       <div class="slide">
           <img src="assets/images/marcas/nike.png" alt="">
       </div>

       <div class="slide">
           <img src="assets/images/marcas/reebok.png" alt="">
       </div>

       <div class="slide">
           <img src="assets/images/marcas/topper.png" alt="">
       </div>
       
       <div class="slide">
         <img src="assets/images/marcas/puma.png" alt="">
     </div>

         <div class="slide">
            <img src="assets/images/marcas/fila.png" alt="">
      </div>

       <div class="slide">
           <img src="assets/images/marcas/newbalance.png" alt="">
       </div>

       <div class="slide">
           <img src="assets/images/marcas/under.png" alt="">
       </div>

       <div class="slide">
           <img src="assets/images/marcas/umbro.png" alt="">
       </div>

   
   </div>
</div>

<div class="lastDeliver">
  <h3 class="lastDeliverTitle">Ultimas Entregas</h3>
  <div class="lastDeliverImages">
    <div class="lastDeliverImagesImage">
      <img class="lastDeliver__img" src="https://nikearprod.vtexassets.com/assets/vtex.file-manager-graphql/images/4c704d38-f68b-462a-9a7e-1e8662836a57___8ec451c00a1d97a219981e5167425f49.png" alt="img2"/>
      <h3 class="lastDeliverTitleImg">Sueños de Grandeza</h3>
      <span class="lastDeliverBetsyImg">betsy</span>
      <a href="<?php echo base_url('products?category=2')?>" class="lastDeliverImages__btn">Descubre</a>
    </div>
    
    <div class="lastDeliverImagesImage">
    <img class="lastDeliver__img" src="https://nikearprod.vtexassets.com/assets/vtex.file-manager-graphql/images/3328bd2b-7c78-4c89-b3c0-4ce0dd415a3c___66db48f5eefe8e654e8fb2859a678bd2.png" alt="img2"/>
    <h3 class="lastDeliverTitleImg" style="color: white">Comienza Hoy</h3>
    <span class="lastDeliverBetsyImg">betsy</span>
    <a href="<?php echo base_url('products?gender=2')?>" class="lastDeliverImages__btn dark">Descubre</a>
  </div>
  
  </div>
</div>


<div class="ourservice">
    
  <h3 class="ourservice__title">
    Confía en Nosotros 
  </h3>

   <div class="ourservice__wrapper container">

      <div class="ourservice__wrapper__service">
        <img class="ourservice__wrapper__service__svg" src="assets/images/nosotros/payment.svg" alt="My Happy SVG" />
        <h3 data-bs-toggle="modal" data-bs-target="#compra" class="ourservice__wrapper__service__title">Comprá como Gustes</h3>
      </div>

      <div class="ourservice__wrapper__service">
        <img class="ourservice__wrapper__service__svg" src="assets/images/nosotros/send.svg" alt="My Happy SVG"/>
        <h3 data-bs-toggle="modal" data-bs-target="#envio"   class="ourservice__wrapper__service__title">Recíbelo en Casa</h3>
      </div>

      <div class="ourservice__wrapper__service">
        <img  class="ourservice__wrapper__service__svg" src="assets/images/nosotros/security.svg" alt="My Happy SVG"/>
        <h3 data-bs-toggle="modal" data-bs-target="#security"  class="ourservice__wrapper__service__title">Comprá Seguro</h3>
      </div>

   </div>
</div>

<div class="membership">

  <div class="membership__wrapper">
    <h3 class="membership__wrapper__title">Betsy Membership</h3>
    <div class="membership__wrapper__photos">
  
  <div>
    <img src="assets/images/membership/member1.webp" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member2.webp" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member3.jpg" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member5.jpg" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member11.jpg" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member8.jpg" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member9.jpg" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member4.jpg" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member7.jpg" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member12.jpg" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member6.webp" class="membership__wrapper__photos__photo"></div>
      <div>
      <img src="assets/images/membership/member10.jpg" class="membership__wrapper__photos__photo"></div>

      <button class="btn btn-lg btn-danger text-white left" id="btn-left"><i class="bi bi-chevron-compact-left"></i></button>
      <button id="btn-right" class="btn btn-lg btn-danger text-white right"><i class="bi bi-chevron-compact-right"></i></button>
</div>

  
</div>
</div>
 


<!-- Modal -->
<div class="modal fade" id="security" tabindex="-1" aria-labelledby="securityLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="securityLabel">Compra Seguro</h1>
        <button type="button" class="btn-close btn-ligth" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mt-3">
          <h5>¿No te gusta?</h5>
          <p>En Betsy, nos preocupamos por la seguridad y privacidad de nuestros clientes. Por ello, hemos implementado una serie de medidas que garantizan la seguridad de todas las compras que se realizan en nuestra plataforma.
          <br>
          En primer lugar, contamos con un certificado SSL que protege los datos de los usuarios y encripta la información durante la transmisión. Además, utilizamos un sistema de pago seguro que cumple con los más altos estándares de seguridad en la industria.
          <br>
          Asimismo, trabajamos con los principales proveedores de pagos en línea, quienes garantizan la protección de los datos de los clientes y previenen el fraude en todas las transacciones.
          <br>
          Por último, estamos comprometidos con la protección de la privacidad de nuestros usuarios y cumplimos con las leyes y regulaciones aplicables en materia de protección de datos personales.
          <br>
          En resumen, en Betsy puedes realizar tus compras con total tranquilidad, sabiendo que tus datos están protegidos y que la seguridad es nuestra máxima prioridad.</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="envio" tabindex="-1" aria-labelledby="envioLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="envioLabel">Recíbelo en Casa</h1>
        <button type="button" class="btn-close btn-ligth" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mt-3">
          <h5>No hace falta que te muevas de tu casa</h5>
          En Betsy, queremos que la experiencia de compra sea lo más satisfactoria posible para nuestros clientes. Por eso, ofrecemos un método de envío gratuito en todos nuestros productos.
          <br>
        Este método de envío gratuito es válido para todos los pedidos que superen 250USD y se envían a direcciones dentro de Argentina. El plazo de entrega para este método depende de ubicación y es realizado por nuestros proveedores de logística de confianza.
        <br>
        Además, también ofrecemos opciones de envío exprés y prioritario para aquellos clientes que necesiten recibir su pedido con mayor rapidez. Estos métodos de envío tienen un costo adicional, que se mostrará claramente durante el proceso de compra.
        <br>
        Queremos que nuestros clientes puedan disfrutar de nuestros productos sin preocuparse por el costo de envío, por lo que nuestro método de envío gratuito es una forma de agradecer su confianza y fidelidad.
        <br>
        Si tienes alguna duda o necesitas más información sobre nuestros métodos de envío, no dudes en contactarnos a través de nuestro centro de atención al cliente.
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="compra" tabindex="-1" aria-labelledby="compraLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="compraLabel">Comprá como gustes</h1>
        <button type="button" class="btn-close btn-ligth" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mt-3">
          <h5>Tarjeta de crédito o débito</h5>
          <p>Pagá en cuotas sin interés o hacelo al contado con tu tarjeta de débito.</p>
        </div>

        <div class="mt-3">
          <h5>¿Preferís pagar en efectivo?</h5>
          <p>Pagá en cuotas sin interés o hacelo al contado con tu tarjeta de débito.</p>
        </div>

        <div class="mt-3">
          <h5> Transferí desde tu homebanking</h5>
          <p>Es tan simple que podés hacerlo desde el sillón de tu casa.</p>
        </div>
    
      </div>
    </div>
  </div>
</div>