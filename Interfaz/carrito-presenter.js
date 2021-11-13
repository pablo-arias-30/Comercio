class CarritoPresenter {
    constructor(model, view) {
        this.model = model;
        this.view = view; // es igual al document
        //        this.refresh();
    }



    refresh() {
        console.log(this.model);
        for (let articulo of this.model.compras) {
            let id = articulo.id;
            let nombre = articulo.nombre;
            let logo = articulo.logo;
            let precio = articulo.precio;
            let imagen = articulo.imagen;
            let color = articulo.color;

            let bloque = document.getElementById('imagenCarrito');
            let img = new Image();
            img.src = '../Recursos/'+ articulo._imagen;
            bloque.appendChild(img);
            //document.location.href = "compras.php";*/

        }
    }
}

