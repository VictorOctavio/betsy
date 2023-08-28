document.addEventListener('DOMContentLoaded', e => {
   const containterMemberships = document.querySelector('.membership__wrapper__photos');
   const btnLeft = document.querySelector('#btn-left');
   const btnRight = document.querySelector('#btn-right');


   btnLeft.addEventListener('click', () => {

      console.log(containterMemberships.scrollLeft)
      containterMemberships.scrollLeft = containterMemberships.scrollLeft-1000;
   })

   btnRight.addEventListener('click', () => {
      containterMemberships.scrollLeft = containterMemberships.scrollLeft+1000;
   })

   setInterval(() => {
      let scrollMove = Math.random() * (600 - 300) + 300;
      let scrollSize = containterMemberships.scrollWidth;   

      if((containterMemberships.scrollLeft + scrollMove) >= scrollSize){
         containterMemberships.scrollLeft = containterMemberships.scrollLeft-scrollMove;
      }else{
         containterMemberships.scrollLeft = containterMemberships.scrollLeft+scrollMove;
      }   
   }, 5000)


})
