CREATE TABLE articulo (
  IDArt integer(10) PRIMARY KEY,
  nombre varchar (35) NOT NULL,
  marca varchar(25) NOT NULL,
  tipo varchar(25) DEFAULT NULL CHECK (
    tipo IN (
      'Gafas de sol',
      'Gafas de cerca',
      'Gafas de lejos',
      'Gafas progresivas',
      'lentillas',
      'liquidos'
    )
  ),
  precio float(7, 2) NOT NULL,
  color varchar(15) DEFAULT NULL,
  logo varchar (150),
  imagen varchar (150),
  cantidad integer (10),
  codA integer(10) NOT NULL REFERENCES almacen(codA) ON UPDATE CASCADE,
  codP integer (20) NOT NULL REFERENCES proveedor(codP) ON UPDATE CASCADE
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
  PRIMARY KEY (codP, codA)
);

CREATE TABLE IF NOT EXISTS cliente (
  dni char(9) PRIMARY KEY,
  nombre varchar(60) NOT NULL,
  telefono integer NOT NULL UNIQUE,
  direccion varchar (100) NOT NULL,
  correo varchar(25) NOT NULL UNIQUE,
  contrasena varchar(25) NOT NULL,
  nacimiento date NOT NULL,
  graduacion varchar (100) DEFAULT NULL
);

CREATE TABLE IF NOT EXISTS compra (
  IDCompra integer(15) PRIMARY KEY,
  fechaCompra DATETIME NOT NULL,
  precio float(7, 2) NOT NULL,
  direccionEnvio varchar (200) NOT NULL,
  fechaPago DATETIME NOT NULL,
  dniCliente char(9) NOT NULL REFERENCES cliente (dni) ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS lineacompra(
  IDLineaCompra integer(15) primary key,
  unidades integer NOT NULL,
  precioUnidad float(7, 2) NOT NULL,
  IDCompra integer(15) NOT NULL REFERENCES compra (IDCompra) ON UPDATE CASCADE,
  IDArt integer (10) NOT NULL REFERENCES articulo (IDArt) ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS contiene(
  IDArt integer NOT NULL REFERENCES articulo (IDArt) ON DELETE CASCADE ON UPDATE CASCADE,
  codA char(3) NOT NULL REFERENCES almacen (codA) ON DELETE CASCADE ON UPDATE CASCADE,
  primary key (IDArt, codA)
);

CREATE TABLE IF NOT EXISTS cita(
  IDCita integer (15) primary key,
  fecha date NOT NULL,
  hora time NOT NULL,
  dniCliente char(9) REFERENCES cliente(dni) ON UPDATE CASCADE
);