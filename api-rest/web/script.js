document.addEventListener('DOMContentLoaded', () => {
    const dataList = document.getElementById('data-list');
  
    // Realizar una solicitud GET a la API REST local
    fetch('/api/data')
      .then((response) => response.json())
      .then((data) => {
        // Procesar los datos y mostrarlos en la página
        data.forEach((item) => {
          const listItem = document.createElement('li');
          listItem.textContent = `ID: ${item.id}, Nombre: ${item.nombre}`;
          dataList.appendChild(listItem);
        });
      })
      .catch((error) => {
        console.error('Error al obtener datos:', error);
      });
  });
  