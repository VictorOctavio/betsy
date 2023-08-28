<div class="userMessages" style="min-height: 90vh; max-height: 90vh; overflow: auto">
   <div class="userMessages__wrapper container" style="height: 100%">
      <h3 class="userMessages__wrapper__title mt-4">Mensajes Recibidos</h3>

      <?php if (count($messages) <= 0 ):  ?>
           No tienes mensajes nuevos!!
      <?php endif ?>     
      <?php foreach($messages as $message): ?>
        <div class="accordion accordion-flush mt-4" id="accordionFlushExample" onclick="readMessage(<?php echo $message['id'] ?>)" 
                style="max-height: 80vh; overflow: auto">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                            data-bs-target="#<?php echo $message['id']?>" aria-expanded="false" aria-controls=" <?php echo $message['id']?>">
                            <span style="width: 10px; height: 10px; border-radius: 50%; margin-right: 10px"
                            class="<?= $message['visto'] ? 'bg-light' : 'bg-danger' ?>"
                            ></span> <?php echo $message['title']?>
                        </button>
                    </h2>
                    <div id="<?php echo $message['id']?>" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <?php echo $message['msg']?>
                            <div class="accordion-footer mt-1 d-flex justify-content-end align-items-center gap-2">
                                <span class="text-info" style="font-size: 12px"><?php echo $message['createdAt']?></span>
                                <button  id="responderEmail" class="btn btn-dark btn-sm" data-bs-toggle="modal" data-bs-target="#responseMessage" data-byEmail="<?php echo $message['email']?>" > Responder </button>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

   </div>
</div>

<script>
    const responderEmail =document.querySelectorAll('#responderEmail')
        responderEmail.forEach(btn => {
            btn.addEventListener('click', (e) => {
                document.querySelector('#emailToSend').value = e.target.dataset['byemail'];
        })
    });

    async function readMessage(e){
        let config = {
            method: 'POST'
        }
            
        await fetch(`<?php echo base_url('')?>/read-msg/${e}`, config);
    }
</script>

<!-- Modal -->
<div class="modal fade" id="responseMessage" tabindex="-1" aria-labelledby="responseMessageLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">New message</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?php echo base_url('/send-email') ?>" >
                <div class="mb-3">
                    <label for="recipient-name" class="col-form-label">To: </label>
                    <input name="para" id="emailToSend" type="text" class="form-control w-100"> 
                </div>

                <input value="<?php echo session()->get('email') ?>" name="email" type="text" class="d-none" id="recipient-name"  >
                
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Titulo:</label>
                    <input name="title" class="form-control w-100" id="message-text">
                </div>

                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea name="msg" class="form-control w-100" id="message-text"></textarea>
                </div>
            <button type="submit" class="btn btn-primary">Send message</button>

            </form>
        </div>
        
    </div>
  </div>
</div>
