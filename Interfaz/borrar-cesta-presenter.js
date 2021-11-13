class BorrarCestaPresenter {
    constructor(model, view) {
        this.model = model;
        this.view = view; // es igual al document
        //        this.refresh();
    }


    borrarCesta(event) {
        this.model.compras = [];
        this.refresh();
    }
    refresh() {
        let cont = this.model.compras.length;
        let carrito = document.getElementById('cesta');
        carrito.innerHTML = cont;
        alert("¡Carrito vaciado!");
    }

}
