CREATE TABLE articulo (
  IDArt integer(10) PRIMARY KEY,
  nombre varchar (35) NOT NULL,
  marca varchar(25) NOT NULL,
  tipo varchar(25) DEFAULT NULL CHECK ( tipo IN ( 'Gafas de sol', 'Gafas de cerca', 'Gafas de lejos','Gafas progresivas', 'lentillas')),
  precio float(7,2) NOT NULL,
  color varchar(15) DEFAULT NULL,
  codA integer(10) NOT NULL REFERENCES almacen(codA) ON UPDATE CASCADE,
  codP integer (20) NOT NULL REFERENCES proveedor(codP) ON UPDATE CASCADE,
  IDCompra integer (15) NOT NULL REFERENCES compra (IDCompra) ON UPDATE CASCADE
);


CREATE TABLE IF NOT EXISTS almacen (
  codA INTEGER(10) PRIMARY KEY,
  localizacion VARCHAR (40) NOT NULL,
  tamaño INTEGER(10) not null
);

CREATE TABLE IF NOT EXISTS proveedor(
    codP INTEGER(20) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    municipio VARCHAR(50),
    telefono INTEGER (9) NOT NULL,
    porcentaje_venta FLOAT NOT NULL,
    iva_aplicado INTEGER DEFAULT 21
);

CREATE TABLE IF NOT EXISTS suministra(
  codP INTEGER (10) NOT NULL REFERENCES proveedor(codP) ON UPDATE CASCADE ON DELETE CASCADE,
  codA INTEGER (10) NOT NULL REFERENCES articulo(codA) ON UPDATE CASCADE ON DELETE CASCADE,
  PRIMARY KEY (codP,codA)
);


CREATE TABLE IF NOT EXISTS cliente (
  dni char(9) PRIMARY KEY,
  nombre varchar(60) NOT NULL,
  telefono integer NOT NULL UNIQUE,
  direccion varchar (100) NOT NULL,
  correo varchar(25) NOT NULL,
  graduacion varchar (100) DEFAULT NULL
    );

CREATE TABLE IF NOT EXISTS compra (
  IDCompra integer(15) PRIMARY KEY,
  fechaCompra date NOT NULL,
  precio float(7,2) NOT NULL,
  direccionEnvio varchar (60) NOT NULL,
  fechaPago date NOT NULL,
  dniCliente char(9) NOT NULL REFERENCES cliente (dni) ON UPDATE CASCADE
); 


CREATE TABLE IF NOT EXISTS lineacompra(
  IDLineaPedido integer(15) primary key,
  unidades integer NOT NULL,
  precio float(7,2) NOT NULL,
  IDCompra integer(15) NOT NULL REFERENCES compra (IDCompra) ON UPDATE CASCADE,
  IDArt integer (10) NOT NULL REFERENCES articulo (IDArt) ON UPDATE CASCADE
);