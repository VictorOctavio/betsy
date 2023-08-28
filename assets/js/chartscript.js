document.addEventListener('DOMContentLoaded', function() {
   // Obtener una referencia al elemento canvas del DOM
   const $grafica = document.querySelector("#grafica");
   const lastMonth = $grafica.dataset['lastmonth'];

   // Las etiquetas son las que van en el eje X. 
   const etiquetas = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
   // Podemos tener varios conjuntos de datos. Comencemos con uno

   const datosVentas2023 = {
      label: "Ventas 2023",
      data: [54, 56, 65, 61, 79, lastMonth], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
      backgroundColor: 'crimson', // Color de fondo
      borderColor: 'white', // Color del borde
      borderWidth: 1,// Ancho del borde
   };

   const datosVentas2022 = {
      label: "Ventas 2022",
      data: [44, 36, 35, 41, 50, 47, 39, 55, 43, 32, 46, 44], // La data es un arreglo que debe tener la misma cantidad de valores que la cantidad de etiquetas
      backgroundColor: '#fff',// Color de fondo
      borderColor: '#ccc',// Color del borde
      borderWidth: 1,// Ancho del borde
  };

   new Chart($grafica, {
      type: 'line',// Tipo de gráfica
      data: {
         labels: etiquetas,
         datasets: [
               datosVentas2023,
               datosVentas2022,
         ]
      },
      options: {
        
      }
   });
})

