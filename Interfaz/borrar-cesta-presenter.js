class BorrarCestaPresenter {
    constructor(model, view) {
        this.model = model;
        this.view = view; // es igual al document
        //        this.refresh();
    }


    borrarCesta() {
        this.model.compras = [];
        this.refresh();
    }
    refresh() {
        let cont = this.model.compras.length;
        let carrito = document.getElementById('cesta');
        carrito.innerHTML = cont;
        alert("¡Carrito vaciado!");
        document.cookie = 'items=' + this.model.compras.length +' ;max-age=3600*60; path=/';
    }
    borrarCompras(){ //Borra todo el localStorage
        this.model.borrarCompras();
    }

}
