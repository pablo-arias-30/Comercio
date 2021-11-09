class AgregarArticuloPresenter {
    constructor(model, view) {
        this.model = model;
        this.view = view; // es igual al document
        //        this.refresh();
    }


    guardarClick(event) {
        event.preventDefault(); //cancela el evento para que no te lleve a la siguiente ventana
        let id = leerCookie("id");
        let nombre = leerCookie("nombre");
        let logo = leerCookie("logo");
        let precio = leerCookie("precio");
        let imagen = leerCookie("imagen");
        let color = leerCookie("color");
        let articulo = this.model.agregarArticulo(id, nombre, imagen, logo, precio, color);
        console.log(articulo);
        this.refresh();
        //document.location.href = "compras.php";

    }
    refresh() {
        let cont = this.model.compras.length;
        let carrito = document.getElementById('cesta');
        carrito.innerHTML = cont;

    }


}
function leerCookie(nombre) {
    let cookies = document.cookie.split(";"); //separamos cookies por ;
    for (let i = 0; i < cookies.length; i++) {
        let busca = cookies[i].search(nombre);
        if (busca > -1) { cookies = cookies[i] } //la encuentra cuando no devuelve -1 
    }
    //cookie = valor;
    let igual = cookies.indexOf("="); //obtenemos el índice del " = "
    cookies = cookies.substring(igual + 1); //sacamos un subString de todo el String con el valor de la cookie
    return cookies;
}