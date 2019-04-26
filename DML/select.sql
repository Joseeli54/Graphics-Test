-- CONSULTAR CANTIDAD DE CLIENTES SEGUN EL TIPO DE 

select count(*) from pago p, pedido pe, usuario u, credito c where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and c.cod = p.fk_credito;

select count(*) from pago p, pedido pe, usuario u, debito d where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and	d.cod = p.fk_debito;
	  
select count(*) from pago p, pedido pe, usuario u, efectivo e  where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and e.cod = p.fk_efectivo;
	  
select count(*) from pago p, pedido pe, usuario u, paypal pa where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and pa.cod = p.fk_paypal;