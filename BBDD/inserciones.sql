INSERT INTO cliente (dni, nombre, telefono, direccion, correo, nacimiento, graduacion, contrasena) VALUES
( '74560661C', 'Cristiano Ronaldo',969000333, 'Avenida España, 16', 'cr7@comercio.es','1986/05/03','','cr7' ),
( '82257405R', 'Miguel Herran', 967214500,'Calle Boteros, 4', 'miguelhe@comercio.es', '1996/06/30','2,5 dioptrías en ambos ojos de astigamtismo','miguel'),
( '89275991L', 'Vinicius Ruescas', 653804053,'Calle Tejares, 5', 'vinijr@comercio.es','2010/04/15', '5 dioptrías ojo izquierdo astigmatimso, 1,5 dioptrías en ojo derecho hipermetropía','vini'),
( '62550311V', 'Rafa Nadal',969433363, 'Avenida Puerto Indias, 23', 'rafanadal@comercio.es','1994/12/25','','rafa'),
( '28611552N', 'Rosario Flores',612458787, 'Calle Villar Encina, 62', 'rosaflowers@comercio.es','1983/02/14', '1,5 ambos ojos astigmatismo','rosa'),
( '90414531J', 'Ester Exposito', 666841377,'Avenida Concepción, 12', 'estero@comercio.es', '2000/08/17','0,25 astigmatismo ambos ojos','ester'),
( '03203593S', 'David Bisbal', 601522533,'Calle Cuenca, 45', 'bisbi@comercio.es', '1999/05/22','','bisbal'),
( '14635054Q', 'Luuk de Jong', 911885400, 'Calle Pizarro, 33', 'luuk@comercio.es','1975/08/24','','luk' );

INSERT INTO compra (IDCompra, fechaCompra, precio, direccionEnvio, fechaPago, dniCliente) VALUES 
(1,'2021/03/21','210','Avenida de España 43, Albacete','2021/03/22','49256124Y'),
(2,'2021/03/26','50','Calle Simón 28, Ciudad Real','2021/03/26','32145654Y'),
(3,'2021/04/01','60','Calle Juan Gabriel 15, Murcia','2021/04/07','06452314S'),
(4,'2021/04/22','367.5','Calle Sanabria 20, Alcázar de San Juan','2021/04/23','07145362T');
INSERT INTO proveedor VALUES
 (1,'GafasXXL','Albacete','652369852', 12, 18),
 (2,'Glasses','La Roda','652368965', 10,'' ),
 (3,'Andujar','Riopar','695823623', 9, 19),
 (4,'Lorca SA','Albacete','67469852', 12,'' );

 INSERT INTO almacen VALUES 
(1,'Madrid',3000),(2,'Valencia',2300),(3,'Albacete',2500);

INSERT INTO articulo (IDArt, nombre, marca, tipo, precio, color, codA, codP, IDCompra) VALUES
(1, 'Gafas de sol graduadas deluxe Tommy Hilfiger', 'Tommy Hilfiger', 'Gafas de sol', '120','Negro','1','1' ,'1'),
(2, 'Gafas de sol Polaroid', 'Polaroid', 'Gafas de sol', '50','Gris','1','2', '2'),
(3, 'Gafas de sol Carrera', 'Carrera', 'Gafas de sol', '60','Negro','1','2', '3'),
(4, 'Gafas progresivas Carolina Herrera','Carolina Herrera', 'Gafas progresivas', '187.50','Rosa', '2', '1', '4'),
(5, 'Gafas de cerca Ray-Ban', 'Ray-Ban', 'Gafas de cerca', '180', 'Rojo','3', '3','4'),
(6, 'Gafas progresivas Lacoste', 'Lacoste', 'Gafas progresivas', '90','Dorado', '3', '2','1');

INSERT INTO suministra VALUES
 (1,2),(1,3),(3,5),(2,4),(4,1);

 INSERT INTO lineacompra VALUES 
('11','3',350.3,'1','2'),
('12','1',150,'2','1'),
('13','2',230.75,'3','3'),
('14','1',180.55,'4','5');

INSERT INTO contiene VALUES 
(1,1), (2,3), (3,1), (4,3), (5,2);

INSERT INTO cita VALUES
('1',"2021/10/23",'74560661C'),('2', "2021/10/25",'03203593S'), ('3',"2021/11/02",'62550311V'),('4',"2021/12/25",'74560661C');