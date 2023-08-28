document.addEventListener('DOMContentLoaded', () => {

       // VARS
      const navbar = document.querySelector('#navbar')
      const navbarContainerSecondary = document.querySelector('#navbarSecondary')
      const navbarLogotype = document.querySelector('#logotype')
      const btnRemoveCart = document.querySelector('#btn-remove-cart'); 
      const btnCart = document.querySelector('#btn-cart'); 
      const cartContainer = document.querySelector('#cart');

      navbarLogotype.addEventListener('mouseover', (e) => {
         navbarContainerSecondary.classList.add('active')
      })

      navbar.addEventListener('mouseleave', () => {
         navbarContainerSecondary.classList.remove('active')
      })

      btnRemoveCart.addEventListener('click', (e) => {
         cartContainer.classList.remove('active')
      })
      
      btnCart.addEventListener('click', (e) => {
         cartContainer.classList.add('active')
      })

      // Redirect
      const itemsList = document.querySelectorAll('.contain__sections__list__item');

      itemsList.forEach(item => {
         item.addEventListener('click', (e) => {
               window.location.href = `${window.location.origin}/gauna_octavio/products`
         })
      })
})

