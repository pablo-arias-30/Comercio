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
            for (let articulo of this.model.compras) {
                console.log(articulo);
                let bloqueGrande = document.getElementById('bloqueGrande');
                let bloquePequeño = document.createElement('div');
                bloquePequeño.innerHTML = '<div id="gafas"><img id="imagen" src="../Recursos/' + articulo._imagen + '"></img>'
                    + '<img id="marca" src="../Recursos/' + articulo._logo + '"></img>' +
                    '<p id="p1"><strong>' + articulo._nombre.replace(/%20/g, " ") + '</strong></p><p id="p1">Color:' + articulo._color + '</p>' +
                    '<p id="p1"><strong>' + articulo._precio + ' €</strong></p>' +
                    '<p id="p1">Cantidad seleccionada: ' + articulo._cantidad + '</p>' +
                    '<p id="p1">ID de Referencia:' + articulo._id + '</p></div>';
                //Añadimos precio, color, cantidad, imagen, etc. Replace nos permite reemplazar los %20 de los espacios
                bloqueGrande.appendChild(bloquePequeño);

            }
        }
    }
}

