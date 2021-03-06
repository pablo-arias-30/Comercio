INSERT INTO cliente (dni, nombre, telefono, direccion, correo, nacimiento, graduacion, contrasena) VALUES
( '74560661C', 'Cristiano Ronaldo',969000333, 'Avenida España, 16', 'cr7@comercio.es','1986/05/03','','cr7' ),
( '82257405R', 'Miguel Herran', 967214500,'Calle Boteros, 4', 'miguelhe@comercio.es', '1996/06/30','2,5 dioptrías en ambos ojos de astigamtismo','miguel'),
( '89275991L', 'Vinicius Ruescas', 653804053,'Calle Tejares, 5', 'vinijr@comercio.es','2010/04/15', '5 dioptrías ojo izquierdo astigmatimso, 1,5 dioptrías en ojo derecho hipermetropía','vini'),
( '62550311V', 'Rafa Nadal',969433363, 'Avenida Puerto Indias, 23', 'rafanadal@comercio.es','1994/12/25','','rafa'),
( '28611552N', 'Rosario Flores',612458787, 'Calle Villar Encina, 62', 'rosaflowers@comercio.es','1983/02/14', '1,5 ambos ojos astigmatismo','rosa'),
( '90414531J', 'Ester Exposito', 666841377,'Avenida Concepción, 12', 'estero@comercio.es', '2000/08/17','0,25 astigmatismo ambos ojos','ester'),
( '03203593S', 'David Bisbal', 601522533,'Calle Cuenca, 45', 'bisbi@comercio.es', '1999/05/22','','bisbal'),
( '14635054Q', 'Luuk de Jong', 911885400, 'Calle Pizarro, 33', 'luuk@comercio.es','1975/08/24','','luk' );



INSERT INTO proveedor VALUES
 (1,'GafasXXL','Albacete','652369852', 12, 18),
 (2,'Glasses','La Roda','652368965', 10,'' ),
 (3,'Andujar','Riopar','695823623', 9, 19),
 (4,'Lorca SA','Albacete','67469852', 12,'' );

 INSERT INTO almacen VALUES 
(1,'Madrid',3000),(2,'Valencia',2300),(3,'Albacete',2500);

INSERT INTO articulo (IDArt, nombre, marca, tipo, precio, color, codA, codP,logo,imagen,cantidad) VALUES
(1, 'Gafas de sol graduadas deluxe Tommy Hilfiger', 'Tommy Hilfiger', 'Gafas de sol', '120','Negro','1','1','Tommy-Hilfiger-logo.png','gafasDeSol1.png',20),
(2, 'Gafas de sol Polaroid', 'Polaroid', 'Gafas de sol', '50','Gris','1','2','logo-polaroid.png','gafas2.png',20),
(3, 'Gafas de sol Carrera', 'Carrera', 'Gafas de sol', '60','Negro','1','2','logo-carrera.png','gafas3.png',19),
(4, 'Gafas de sol Tommy Hilfiger premium', 'Tommy Hilfiger', 'Gafas de sol', '200','Negro','1','1' ,'Tommy-Hilfiger-logo.png','gafas4.jpg',18),
(7, 'Gafas progresivas Carolina Herrera','Carolina Herrera', 'Gafas progresivas', '187.50','Azul', '2', '1','carolina.png','gafas9.png',63),
(6, 'Gafas de cerca Ray-Ban', 'Ray-Ban', 'Gafas de cerca', '180', 'Dorado','3', '3','RAYBAN_LOGO.png','gafas6.png',65),
(8, 'Gafas graduadas Carolina Herrera','Carolina Herrera', 'Gafas progresivas', '215.90','Rosa', '2', '1','carolina.png','gafas8.png',77),
(9, 'Gafas progresivas Lacoste', 'Lacoste', 'Gafas progresivas', '90','Negro', '3', '2','Lacoste-Logo.png','gafas7.png',56),
(10, 'Lentillas 009','Biofinity', 'lentillas', '95.90','N/A', '2', '1','biofinity-logo.png','fotoLentillas.jpg',98),
(11, 'Liquido 350ml 010','Biofinity', 'liquidos', '15.50','N/A', '3', '1','biofinity-logo.png','liquido.png',123);


INSERT INTO suministra VALUES
 (1,2),(1,3),(3,5),(2,4),(4,1);


INSERT INTO contiene VALUES 
(1,1), (2,3), (3,1), (4,3), (5,2);

INSERT INTO cita VALUES
('1',"2021/10/23","19:00:00",'74560661C'),('2', "2021/10/25", "18:00:00",'03203593S'), ('3',"2021/11/02","17:00:00",'62550311V'),('4',"2021/12/25","20:00:00",'74560661C');