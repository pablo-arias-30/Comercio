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
}

class ComprasApp {
    constructor() {
        //    if (this.tareas == undefined) //no tiene sentido porque nunca sera undifined
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
    agregarArticulo(id, nombre, imagen, logo, precio, color) {
        let result = new Articulo(id, nombre, imagen, logo, precio, color);
        //  setTimeout(() => { this.tareas.push(result = new Tarea(titulo, descripcion)); }, 1);
        this._compras.push(result); //un objeto con el array adentro
        DB.serialize({ compras: this._compras });
        return result;
    }
    borrarTarea(id) {
        this.compras = this.compras.filter((articulo) => articulo._id != id); //Deserializa, devuelve un array con todos los que cumplen la condicion de no tener ese id, y se vuelven a serializar con el setter
        //parte izq getter, derecha settter


        // let tarea = this.tareas.find((tarea) => { return tarea.id == id }); //esta mal hecho
        // let index = this.tareas.indexOf(tarea); //devuelve indice, como el this hace un get, deserializa creando otro objeto cada vez
        // this._tareas.splice(index, 1);
        //console.log(this._tareas); //para saber si lo borro o no
        // DB.serialize({ tareas: this._tareas });


    }
    /* modificarTarea(id, titulo, descripcion) {
         //this.borrarTarea(id);
         //push de una nueva
         console.log(id);
         let tarea = this.tareas.find((tarea) => { return tarea._id == id });
         console.log(tarea);
         tarea._titulo = titulo;
         tarea._descripcion = descripcion;
         DB.serialize({tareas:this._tareas}); //guardamos en la bbdd
         return tarea;
 
     }*/
    verArticulo(id) {
        return this.compras.find((articulo) => { return articulo._id == id });

    }
}

class Articulo {
    constructor(id, nombre, imagen, logo, precio, color) {
        this._id = id;
        this._nombre = nombre;
        this._imagen = imagen;
        this._logo = logo;
        this._precio = precio;
        this._color = color;

    }
}