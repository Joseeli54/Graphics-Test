-- INSERT DE LOS USUARIOS DEL SISTEMA --

insert into usuario values(1, 26089396, 'Jose', 'Elias', 'Barrientos', 'Rivera', 'barrientosjoseelias@hotmail.com');
insert into usuario values(2, 26993454, 'Maria', 'Fernanda', 'Mendoza', 'Diaz', 'mariafernanda@hotmail.com');
insert into usuario values(3, 27394827, 'Jesus', 'Eduardo', 'Navaz', 'Aponte', 'jesuseduardo@hotmail.com');
insert into usuario values(4, 23847372, 'Felipe', 'Mauricio', 'Contreras', 'Mejias', 'felipemauricio@hotmail.com');
insert into usuario values(5, 29384723, 'Antonio', 'Jose', 'Paz', 'Bustamante', 'antoniojose@hotmail.com');
insert into usuario values(6, 25837263, 'Pedro', 'Pacheco', 'Alvarado', 'Stiffano', 'pedropacheco@hotmail.com');

-- INSERT DE LOS PEDIDOS REALIZADOS --	

insert into pedido values(1, 'aluminio', 'objeto', 1);
insert into pedido values(2, 'marmol', 'objeto', 1);
insert into pedido values(3, 'cota', 'destino', 2);
insert into pedido values(4, 'cota', 'destino', 3);	
insert into pedido values(5, 'oro', 'proveedor', 4);	
insert into pedido values(6, 'aluminio', 'objeto', 5);
insert into pedido values(7, 'papel', 'objeto', 6);
insert into pedido values(8, 'madera', 'objeto', 6);

-- INSERT DE CREDITOS --

insert into credito values(1, 222, 'Pago de objeto', '02-05-20', 23123045739384738329);
insert into credito values(2, 333, 'Pago de objeto', '02-05-20', 23123045739384738329);

-- INSERT DEBITO --

insert into debito values(1, 222, 'Pago de material destino', 'provincial');
insert into debito values(2, 333, 'Pago de material destino', 'provincial');
insert into debito values(3, 444, 'Pago a proveedores', 'mercantil');

-- INSERT PAYPAL --

insert into efectivo values(1, 213, 1);
insert into efectivo values(2, 245, 1);

-- INSERT EFECTIVO --

insert into paypal values(1, 213, 1);

-- INSERT PAGO --

insert into pago values(1, 187087.00, '02-03-2019', null, 1,null,null,1);
insert into pago values(2, 9388.00, '02-03-2019', null, 2,null, null,2);
insert into pago values(3, 2435.00, '02-04-2019', 1, null,null, null, 3);
insert into pago values(4, 928415.00, '02-04-2019', 2, null,null, null, 4);
insert into pago values(5, 2435.00, '03-04-2019', 3, null,null, null, 5);
insert into pago values(6, 187087.00, '02-03-2019', null, null,1,null,6);
insert into pago values(7, 9388.00, '02-03-2019', null, null,2, null,7);
insert into pago values(8, 10239.00, '02-03-2019', null, null,null, 1, 8);
