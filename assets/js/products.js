window.addEventListener('DOMContentLoaded', () => {
   
   const btnFilter = document.querySelector('#filter');
   const filters = document.querySelector('#filters');
   
   btnFilter.addEventListener('click', () => {
      if(filters.classList.contains('active')){
         filters.classList.remove('active');
      }else{
         filters.classList.add('active');
      }
   })

   // Query filter
   const itemList = document.querySelectorAll('#item-list')

   itemList.forEach(item => {
      item.addEventListener('click', (e) => {
         if(e.target.classList.contains('active')){
            e.target.classList.remove('active');
         }else{
            e.target.classList.add('active');
         }
      })
   })
  

})