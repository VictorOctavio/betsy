document.addEventListener("DOMContentLoaded", e => {
   const mycardimg = document.querySelectorAll('#mycardimg');
   
   mycardimg.forEach(card => {

      card.addEventListener("mouseover", e => {

         let element = e.target;
         //console.log(element.dataset.img1);
         card.style.backgroundImage = `url(${element.dataset.img2})`
      })

      card.addEventListener("mouseleave", e => {
         let element = e.target;
   
         card.style.backgroundImage = `url(${element.dataset.img1})`
      })

   })
  
})