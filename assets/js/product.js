window.addEventListener('DOMContentLoaded', () => {
   const imgActive = document.querySelector('#img-active');
   const galeryImg = document.querySelectorAll('#galery-img');

   galeryImg.forEach(img => {
         img.addEventListener('mouseover', (e) => {
            imgActive.style.backgroundImage = `url('${e.target.attributes[1].value}')`
         })
   })

})