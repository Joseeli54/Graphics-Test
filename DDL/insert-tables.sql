-- INSERT DE LOS USUARIOS DEL SISTEMA --

insert into usuario values(1, 26089396, 'Jose', 'Elias', 'Barrientos', 'Rivera', 'barrientosjoseelias@hotmail.com');
insert into usuario values(2, 26393454, 'Maria', 'Fernanda', 'Mendoza', 'Diaz', 'mariafernanda@hotmail.com');
insert into usuario values(3, 27394827, 'Jesus', 'Eduardo', 'Navaz', 'Aponte', 'jesuseduardo@hotmail.com');
insert into usuario values(4, 23847372, 'Felipe', 'Mauricio', 'Contreras', 'Mejias', 'felipemauricio@hotmail.com');
insert into usuario values(5, 29384723, 'Antonio', 'Jose', 'Paz', 'Bustamante', 'antoniojose@hotmail.com');
insert into usuario values(6, 25837263, 'Pedro', 'Pacheco', 'Alvarado', 'Stiffano', 'pedropacheco@hotmail.com');
insert into usuario values(7, 28343212, 'Jose', 'Gregorio', 'Mujica', 'Rivera', 'josegregorio@hotmail.com');
insert into usuario values(8, 30234323, 'Daniel', 'Eduardo', 'Diaz', 'Diaz', 'danieldiaz@hotmail.com');
insert into usuario values(9, 28373432, 'Pedro', 'Miguel', 'Fumero', 'Rodriguez', 'pedromiguel@hotmail.com');
insert into usuario values(10, 25847382, 'Jose', 'Manuel', 'Contreras', 'Mejias', 'josemanuel@hotmail.com');
insert into usuario values(11, 23485749, 'Antonio', 'Jose', 'Batista', 'Bustamante', 'batista@hotmail.com');
insert into usuario values(12, 24856746, 'Cariana', 'Andrea', 'Salvador', 'Perez', 'cariana@hotmail.com');
insert into usuario values(13, 26384732, 'Angela', 'Sofia', 'Mero', 'Martinez', 'angelasofia@hotmail.com');
insert into usuario values(14, 23847362, 'Mariana', 'Del Carmen', 'Acevedo', 'Mendoza', 'mariana@hotmail.com');
insert into usuario values(15, 21384932, 'Neider', 'Eduardo', 'Bonadio', 'Aponte', 'neider@hotmail.com');
insert into usuario values(16, 22343738, 'Jesus', 'Mathias', 'Perez', 'Castillo', 'mathias@hotmail.com');
insert into usuario values(17, 29384738, 'Jose', 'Paz', 'Castillo', 'Barrios', 'josepaz@hotmail.com');
insert into usuario values(18, 31283728, 'Carlos', 'Jose', 'Fernandez', 'Hidalgo', 'carlosjose@hotmail.com');


-- INSERT DE LOS PEDIDOS REALIZADOS --	

insert into pedido values(1, 'Aluminum', 'Material', 1);
insert into pedido values(2, 'Marble', 'Material', 1);
insert into pedido values(3, 'Cota', 'Destination', 2);
insert into pedido values(4, 'Cota', 'Destination', 3);	
insert into pedido values(5, 'Gold', 'Provider', 4);	
insert into pedido values(6, 'Aluminum', 'Material', 5);
insert into pedido values(7, 'Paper', 'Object', 6);
insert into pedido values(8, 'Wood', 'Object', 6);
insert into pedido values(9, 'Wood', 'Object', 7);
insert into pedido values(10, 'Aluminum', 'Material', 8);
insert into pedido values(11, 'Marble', 'Material', 9);
insert into pedido values(12, 'Fan', 'Object', 10);
insert into pedido values(13, 'Cota', 'Destination', 10);	
insert into pedido values(14, 'Gold', 'Provider', 11);	
insert into pedido values(15, 'Aluminum', 'Material', 12);
insert into pedido values(16, 'Paper', 'Object', 13);
insert into pedido values(17, 'Phone', 'Destination', 14);
insert into pedido values(18, 'TV', 'Destination', 14);
insert into pedido values(19, 'Aluminum', 'Material', 15);
insert into pedido values(20, 'Marble', 'Material', 15);
insert into pedido values(21, 'Bottle', 'Provider', 16);
insert into pedido values(22, 'Bottle', 'Provider', 16);	
insert into pedido values(23, 'Gold', 'Provider', 17);	
insert into pedido values(24, 'Aluminum', 'Object', 18);
insert into pedido values(25, 'Hearing aid', 'Material', 18);
insert into pedido values(26, 'Wood', 'Object', 1);
insert into pedido values(27, 'Wood', 'Provider', 1);

-- INSERT DE CREDITOS --

insert into metodo_pago values(1, 222, 'Payment material',null,null, '02-05-20', 23123045739384738329,'Credit');
insert into metodo_pago values(2, 223, 'Payment material',null,null, '02-05-20', 23123045739384738329,'Credit');
insert into metodo_pago values(3, 224, 'Payment material',null,null, '02-05-20', 23123045739384738329,'Credit');
insert into metodo_pago values(4, 225, 'Payment object',null,null, '02-05-20', 23123045739384738329,'Credit');
insert into metodo_pago values(5, 226, 'Payment object',null,null, '02-05-20', 23123045739384738329,'Credit');
insert into metodo_pago values(6, 227, 'Payment object',null,null, '02-05-20', 23123045739384738329,'Credit');

-- INSERT DEBITO --

insert into metodo_pago values(7, 333, 'Payment material destination','provincial',null,null,null,'Debit');
insert into metodo_pago values(8, 334, 'Payment material destination','provincial',null,null,null,'Debit');
insert into metodo_pago values(9, 335, 'Payment provider', 'mercantil',null,null,null,'Debit');
insert into metodo_pago values(10, 336, 'Payment material','provincial',null,null,null,'Debit');
insert into metodo_pago values(11, 337, 'Payment material destination','provincial',null,null,null,'Debit');
insert into metodo_pago values(12, 445, 'Payment provider', 'mercantil',null,null,null,'Debit');
insert into metodo_pago values(13, 250, 'Payment material destination','provincial',null,null,null,'Debit');
insert into metodo_pago values(14, 321, 'Payment material destination','provincial',null,null,null,'Debit');
insert into metodo_pago values(15, 448, 'Payment provider', 'mercantil',null,null,null,'Debit');

-- INSERT PAYPAL --

insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (16, 213, 'Payment provider', 'Cash');
insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (17, 245, 'Payment provider', 'Cash');
insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (18, 214, 'Payment object', 'Cash');
insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (19, 246, 'Payment object', 'Cash');

-- INSERT EFECTIVO --

insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (20, 500, 'Payment provider', 'Paypal');
insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (21, 501, 'Payment object', 'Paypal');
insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (22, 502, 'Payment material', 'Paypal');

-- INSERT OTROS PAGOS --

insert into metodo_pago (cod,numero_pago,descripcion,tipo,tipo_pago) values (23, 211, 'Payment material','Uphold','Digital');
insert into metodo_pago (cod,numero_pago,descripcion,tipo,tipo_pago) values (24, 212, 'Payment material','Dash','Digital');
insert into metodo_pago (cod,numero_pago,descripcion,tipo,tipo_pago) values (25, 213, 'Payment material','AirTM','Digital');
insert into metodo_pago (cod,numero_pago,descripcion,tipo,tipo_pago) values (26, 214, 'Payment object','Transfer','Digital');
insert into metodo_pago (cod,numero_pago,descripcion,tipo,tipo_pago) values (27, 215, 'Payment material','Transfer','Digital');

-- INSERT PAGO --

insert into pago values(1, 187087.00, '02-03-2019',1,1);
insert into pago values(2, 9388.00, '02-03-2019',2,2);
insert into pago values(3, 2435.00, '02-04-2019',3, 5);
insert into pago values(4, 928415.00, '02-04-2019',4,7);
insert into pago values(5, 2435.00, '02-05-2019',5,8);
insert into pago values(6, 187087.00, '05-03-2019',6,9);
insert into pago values(7, 9388.00, '02-06-2019',7,3);
insert into pago values(8, 9232.00, '02-07-2019',8,4);
insert into pago values(9, 20123.00, '02-08-2019',9,5);
insert into pago values(10, 182087.00, '02-09-2019',10,10);
insert into pago values(11, 9338.00, '02-11-2019',11,13);
insert into pago values(12, 2235.00, '02-12-2019',12,14);
insert into pago values(13, 922315.00, '02-13-2019',13,17);
insert into pago values(14, 2423.00, '02-14-2019',14,18);
insert into pago values(15, 181287.00, '02-14-2019',15,21);
insert into pago values(16, 9334.00, '02-15-2019',16,22);
insert into pago values(17, 10259.00, '02-16-2019',17,23);
insert into pago values(18, 10239.00, '02-17-2019',18,12);
insert into pago values(19, 182287.00, '02-18-2019',19,16);
insert into pago values(20, 9381.00, '02-18-2019',20,27);
insert into pago values(21, 2245.00, '02-19-2019',21, 24);
insert into pago values(22, 928115.00, '02-20-2019',22,11);
insert into pago values(23, 2437.00, '02-21-2019',23,15);
insert into pago values(24, 197087.00, '02-21-2019',24,19);
insert into pago values(25, 10388.00, '02-22-2019',25,20);
insert into pago values(26, 12339.00, '02-23-2019',26,26);
insert into pago values(27, 9939.00, '02-24-2019',27,25);
