-- INSERT DE LOS USUARIOS DEL SISTEMA --

insert into usuario values(1, 26089396, 'Jose', 'Elias', 'Barrientos', 'Rivera', 'barrientosjoseelias@hotmail.com');
insert into usuario values(2, 26993454, 'Maria', 'Fernanda', 'Mendoza', 'Diaz', 'mariafernanda@hotmail.com');
insert into usuario values(3, 27394827, 'Jesus', 'Eduardo', 'Navaz', 'Aponte', 'jesuseduardo@hotmail.com');
insert into usuario values(4, 23847372, 'Felipe', 'Mauricio', 'Contreras', 'Mejias', 'felipemauricio@hotmail.com');
insert into usuario values(5, 29384723, 'Antonio', 'Jose', 'Paz', 'Bustamante', 'antoniojose@hotmail.com');
insert into usuario values(6, 25837263, 'Pedro', 'Pacheco', 'Alvarado', 'Stiffano', 'pedropacheco@hotmail.com');

-- INSERT DE LOS PEDIDOS REALIZADOS --	

insert into pedido values(1, 'aluminio', 'Objeto', 1);
insert into pedido values(2, 'marmol', 'Objeto', 1);
insert into pedido values(3, 'cota', 'Destino', 2);
insert into pedido values(4, 'cota', 'Destino', 3);	
insert into pedido values(5, 'oro', 'Proveedor', 4);	
insert into pedido values(6, 'aluminio', 'Objeto', 5);
insert into pedido values(7, 'papel', 'Objeto', 6);
insert into pedido values(8, 'madera', 'Objeto', 6);
insert into pedido values(9, 'madera', 'Proveedor', 1);

-- INSERT DE CREDITOS --

insert into metodo_pago values(1, 222, 'Pago de objeto',null,null, '02-05-20', 23123045739384738329,'Credito');
insert into metodo_pago values(2, 333, 'Pago de objeto',null,null, '02-05-20', 23123045739384738329,'Credito');

-- INSERT DEBITO --

insert into metodo_pago values(3, 222, 'Pago de material destino','provincial',null,null,null,'Debito');
insert into metodo_pago values(4, 333, 'Pago de material destino','provincial',null,null,null,'Debito');
insert into metodo_pago values(5, 444, 'Pago a proveedores', 'mercantil',null,null,null,'Debito');

-- INSERT PAYPAL --

insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (6, 213, 'Pago de objeto', 'Efectivo');
insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (7, 245, 'Pago de objeto', 'Efectivo');

-- INSERT EFECTIVO --

insert into metodo_pago (cod,numero_pago,descripcion,tipo_pago) values (8, 246, 'Pago de objeto', 'Paypal');

-- INSERT OTROS PAGOS --

insert into metodo_pago (cod,numero_pago,descripcion,tipo,tipo_pago) values (9, 247, 'Pago de proveedor','uphold','Digital');

-- INSERT PAGO --

insert into pago values(1, 187087.00, '02-03-2019',1,1);
insert into pago values(2, 9388.00, '02-03-2019',2,2);
insert into pago values(3, 2435.00, '02-04-2019',3, 3);
insert into pago values(4, 928415.00, '02-04-2019',4,4);
insert into pago values(5, 2435.00, '03-04-2019',5,5);
insert into pago values(6, 187087.00, '02-03-2019',6,6);
insert into pago values(7, 9388.00, '02-03-2019',7,7);
insert into pago values(8, 10239.00, '02-03-2019',8,8);
insert into pago values(9, 10239.00, '02-03-2019',9,9);
