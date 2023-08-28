window.addEventListener('DOMContentLoaded', e => {
   //  Mobile -> Panel
   const btnOpenPanel = document.getElementById('btnOpenPanel')
   const btnClosePanel = document.getElementById('btnClosePanel')
   const panelDiv = document.getElementById('panelAdmin')

   btnOpenPanel.addEventListener('click', () => {
      panelDiv.classList.add('active')
   })

   btnClosePanel.addEventListener('click', () => {
      panelDiv.classList.remove('active')
   })


})


