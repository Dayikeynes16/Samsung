

function confirmar() {
    return confirm('¿Estas seguro de eliminar?');
}

function Finalizar() {
    return confirm('¿Finalizar?');
}

function calcularCambio() {
    let totalVentaElement = document.getElementById('totalVenta');
    let totalVenta = parseFloat(totalVentaElement.dataset.total);
    let cantidadRecibida = parseFloat(document.getElementById('cantidad_recibida').value);
    let cambio = cantidadRecibida - totalVenta;
    document.getElementById('cambio').innerText = cambio.toFixed(2); 
}

document.addEventListener('DOMContentLoaded', function() {
    
    fetchVentas();
    setInterval(fetchVentas, 2000); 

    function fetchVentas() {
        fetch('/get-ventas')
        .then(response => response.json())
        .then(data => {
            createButtonsForVentas(data);
        })
        .catch(error => {
            console.error('Error fetching ventas:', error);
        });
    }

    function createButtonsForVentas(ventas) {
        let listaPedidos = document.getElementById('listaPedidos');
        if (!listaPedidos) {
            console.error('El elemento listaPedidos no existe en el DOM.');
            return;
        }
        listaPedidos.innerHTML = '';
    
        ventas.forEach((venta, index) => {
            let listItem = document.createElement('li');
            let button = document.createElement('button');
            button.id = 'ordenes';
            button.className = 'btn btn-primary btn-block';
            button.style.backgroundColor = 'orange';
            button.textContent = `Pedido ${index + 1}: Venta ID ${venta.id}`;
            button.dataset.ventaId = venta.id_venta; 
    
            button.addEventListener('click', () => {
                displayProductos(venta.productoventas, venta.total, venta.id);
                updateFormIds(venta.id);
            });
    
            listItem.appendChild(button);
            listaPedidos.appendChild(listItem);
        });
    }
    
    
    function displayProductos(productos, totalVenta, ventaId) {
        let productosTableBody = document.getElementById('productosTableBody');
        productosTableBody.innerHTML = '';

        productos.forEach(producto => {
            let row = document.createElement('tr');
            row.className="items1";
        
            let nombreCell = document.createElement('td');
            nombreCell.className="item1";
            nombreCell.textContent = producto.producto.nombre;
            let cantidadCell = document.createElement('th');
            cantidadCell.className="items";
            cantidadCell.textContent = producto.cantidad + ' kg';
            let precioCell = document.createElement('th');
            precioCell.className="items";
            precioCell.textContent = '$' + producto.subtotal;

            row.appendChild(nombreCell);
            row.appendChild(cantidadCell);
            row.appendChild(precioCell);
            productosTableBody.appendChild(row);
        });

        
        let totalVentaElement = document.getElementById('totalVenta');
        totalVentaElement.textContent = '$' + totalVenta;
        totalVentaElement.dataset.total = totalVenta;
    }

    function updateFormIds(ventaId) {
        let formCobro = document.getElementById('formCobro');
        let formDiscount = document.getElementById('formDiscount');

        if (formCobro) {
            formCobro.elements['id_venta'].value = ventaId;
        }
        if (formDiscount) {
            formDiscount.elements['id_venta'].value = ventaId;
        }
    }
});

