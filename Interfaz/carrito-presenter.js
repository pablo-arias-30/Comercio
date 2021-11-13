class CarritoPresenter {
    constructor(model, view) {
        this.model = model;
        this.view = view; // es igual al document
        //        this.refresh();
    }



    refresh() {
        console.log(this.model);
        for (let articulo of this.model.compras) {

            let bloque = document.getElementById('imagenCarrito');
            let img = new Image();
            img.src = '../Recursos/'+ articulo._imagen;
            let logo = new Image();
            logo.src = '../Recursos/'+ articulo._logo;
            let nombre = document.createElement('p');
            nombre.innerHTML = '<p id="p1"><'+articulo._nombre+'></p>';
            let color = document.getElementById('p2');
            color.innerHTML = articulo._color;
            let precio = document.getElementById('p3');
            precio.innerHTML = articulo._precio; 
            let id = document.getElementById('id');
            id.innerHTML = articulo._id; 
            bloque.appendChild(img);
            bloque.appendChild(logo);
            bloque.appendChild(nombre);
            bloque.appendChild(color);
            bloque.appendChild(precio);
            bloque.appendChild(id);


            //document.location.href = "compras.php";*/

        }
    }
}

