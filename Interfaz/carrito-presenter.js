class CarritoPresenter {
    constructor(model, view) {
        this.model = model;
        this.view = view;
        // es igual al document
    }



    refresh() {
        console.log(this.model);
        if (this.model.compras.length == 0) {
            let bloqueGrande = document.getElementById('bloqueGrande');
            let h2 = document.createElement('h2');
            h2.innerHTML = '<h2>¡La cesta de la compra está vacía!</h2>';
            bloqueGrande.appendChild(h2);
        } else {
            let bloqueGrande = document.getElementById('bloqueGrande');
            let suma = 0;
            let h2 = document.createElement('h2');
            h2.innerHTML = '<h2>Resumen de tu cesta</h2>';
            bloqueGrande.appendChild(h2);
            for (let articulo of this.model.compras) {
                suma += articulo._precio * articulo._cantidad; //Precio total de la compra
                console.log(articulo);
                let bloquePequeño = document.createElement('div');
                bloquePequeño.innerHTML = '<div id="gafas"><img id="imagen" src="../Recursos/' + articulo._imagen + '"></img>'
                    + '<img id="marca" src="../Recursos/' + articulo._logo + '"></img>' +
                    '<p id="p1"><strong>' + articulo._nombre.replace(/%20/g, " ") + '</strong></p><p id="p1">Color:' + articulo._color + '</p>' +
                    '<p id="p1">Precio por unidad: <strong>' + articulo._precio + ' €</strong></p>' +
                    '<p id="p1">Cantidad seleccionada: <strong>' + articulo._cantidad + '</strong></p>' +
                    '<p id="p1">ID de Referencia:' + articulo._id + '</p></div>';
                //Añadimos precio, color, cantidad, imagen, etc. Replace nos permite reemplazar los %20 de los espacios
                bloqueGrande.appendChild(bloquePequeño);

            } //Muestro precio total
            let bloquePrecio = document.getElementById('bloqueGrande');
            let precioTotal = document.createElement('h3');
            precioTotal.innerHTML = "<h3 id='total'>Precio total a pagar: " + suma + " €</h3>";
            bloquePrecio.appendChild(precioTotal);
        }
    }
}

