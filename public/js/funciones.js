function confirmar(){
   return confirm('¿Estas seguro de eliminar?');
}

function Finalizar(){
   return confirm('¿Finalizar?');
}


function calcularCambio() {
   let totalVentaElement = document.getElementById('totalVenta');
   let totalVenta = parseFloat(totalVentaElement.dataset.total);
   let cantidadRecibida = parseFloat(document.getElementById('cantidad_recibida').value);
   let cambio = cantidadRecibida - totalVenta;
   document.getElementById('cambio').innerText = cambio.toFixed(2); 
}
