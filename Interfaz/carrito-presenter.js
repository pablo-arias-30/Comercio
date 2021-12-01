class CarritoPresenter {
    constructor(model, view) {
        this.model = model;
        this.view = view;
        // es igual al document
    }



    refresh() {
        document.cookie = 'items=' + this.model.compras.length +' ;max-age=3600*60; path=/';
        console.log(this.model);
        if (this.model.compras.length == 0) {
            document.getElementById('vaciar').innerHTML = '<h2>¡La cesta de la compra está vacía!</h2>';
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
                bloquePequeño.innerHTML = '<div id="resumen"><a href="vistaDetallada.php?idA=' + articulo._id + '&nombre=' + articulo._nombre + '&precio='
                    + articulo._precio + '&logo=' + articulo._logo + '&imagen=' + articulo._imagen + '&color= ' + articulo._color +
                    '<p id="pResumen"></p><img id="imagenPequeña" src="../Recursos/' + articulo._imagen + '"></img>'
                    + '<div id="pCarro"><p id="pResumen2"><strong>' + articulo._nombre.replace(/%20/g, " ") + '</p> &nbsp&nbsp&nbsp&nbsp <p id="pResumen3"></strong>' + articulo._precio + ' €/ud</p>' +
                    '<p id="pResumen5">Cantidad: ' + articulo._cantidad + '</p></div>' + '</a></div>';
                //Añadimos precio, color, cantidad, imagen, etc. Replace nos permite reemplazar los %20 de los espacios
                bloqueGrande.appendChild(bloquePequeño);

            } //Muestro precio total
            let bloquePrecio = document.getElementById('bloqueGrande');
            let precioTotal = document.createElement('h3');
            precioTotal.innerHTML = "<h3 id='total'>Precio total a pagar: " + suma + " €</h3>";
            bloquePrecio.appendChild(precioTotal);
        }
    }
    precioTotal() {

        let suma = 0;
        for (let articulo of this.model.compras) {
            suma += articulo._precio * articulo._cantidad; //Precio total de la compra
        }
        return suma;
    }
    numeroItems() {
        return this.model.compras.length;
    }
}
