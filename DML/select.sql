-- CONSULTAS CANTIDAD DE CLIENTES SEGUN EL TIPO DE PAGO

--select count(*) from pago p, pedido pe, usuario u, credito c where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and c.cod = p.fk_credito;
--select count(*) from pago p, pedido pe, usuario u, debito d where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and	d.cod = p.fk_debito;	  
--select count(*) from pago p, pedido pe, usuario u, efectivo e  where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and e.cod = p.fk_efectivo;	  
--select count(*) from pago p, pedido pe, usuario u, paypal pa where pe.id = p.fk_pedido and pe.fk_usuario = u.rif and pa.cod = p.fk_paypal;

-- CONSULTA CANTIDAD DE CLIENTE POR METODO DE PAGO

select pa.tipo_pago,count(*)
from pago p, pedido pe, usuario u, metodo_pago pa
where pe.fk_usuario = u.cod and
      p.fk_pedido = pe.id and
	  p.fk_metodo = pa.cod
group by pa.tipo_pago;

-- CONSULTA PROMEDIO DE MONTOS POR PEDIDO

SELECT pe.tipo,sum(pa.monto),count(*)
from pedido pe, pago pa, usuario u
where pe.fk_usuario = u.cod and
      pa.fk_pedido = pe.id
group by pe.tipo;