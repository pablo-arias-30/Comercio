class DB {
    static serialize(object) {
        localStorage.setItem('model', JSON.stringify(object)); //en model voy a guardar el objeto que yo le mande
    }
    static deserialize() {
        let m = localStorage.getItem('model');
        // if (m == undefined) { //hay que ver las que estan vacias para ponerlas en una lista vacia
        //    return { tareas: [] }
        // } else return JSON.parse(localStorage.getItem('model')); //parse para que devuelva un objeto
        if (m != undefined) return JSON.parse(localStorage.getItem('model'));
        else m;
    }
    static clear(){
        localStorage.clear();
    }
}


class ComprasApp {
    constructor() {
        //    if (this.tareas == undefined) //no tiene sentido porque nunca sera undefined
        //      this.tareas = [];
        this._compras = DB.deserialize()?.compras;
        if (this._compras == undefined)
            this.compras = []; //es un setter, lo guardamos en la bbdd

    }
    get compras() {
        //let o = DB.deserialize();
        this._compras = DB.deserialize().compras; //antes de devolver el valor //nos devulve nulo si antes no los deserializo
        return this._compras;
    }
    set compras(compras) {
        this._compras = compras;
        // DB.serialize({ tareas: this._tareas });
        //return this._tareas;
        DB.serialize({ compras });
    }
    agregarArticulo(id, nombre, imagen, logo, precio, color, cantidad) {
        let result = new Articulo(id, nombre, imagen, logo, precio, color, cantidad);
        //  setTimeout(() => { this.tareas.push(result = new Tarea(titulo, descripcion)); }, 1);
        this._compras.push(result); //un objeto con el array adentro
        DB.serialize({ compras: this._compras });
        return result;
    }
    borrarCompras(){ //Borra las compras del LocalStorage
        DB.clear();
    }
    modificarArticulo(id, cantidad) {
        let articulo = this.compras.find((articulo) => { return articulo._id == id });
        console.log(articulo);
        articulo._cantidad = parseInt(articulo._cantidad) + parseInt(cantidad); //ParseInt para hacer una suma y no una concatenacion   
        DB.serialize({ compras: this._compras }); //guardamos en la bbdd
        return articulo;

    }

    verArticulo(id) {
        return this.compras.find((articulo) => { return articulo._id == id });

    }
}

class Articulo {
    constructor(id, nombre, imagen, logo, precio, color, cantidad) {
        this._id = id;
        this._nombre = nombre;
        this._imagen = imagen;
        this._logo = logo;
        this._precio = precio;
        this._color = color;
        this._cantidad = cantidad;

    }
}