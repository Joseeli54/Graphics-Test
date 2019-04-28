create table usuario(
   cod integer,
   ci numeric(9),
   pnombre varchar(30),
   snombre varchar(30),
   papellido varchar(60),
   sapellido varchar(60),
   correo varchar(200),
   constraint pk_rif primary key(cod));
   
create table pedido(
   id integer,
   nombre varchar(200),
   tipo varchar(200),
   fk_usuario integer,
   constraint pk_id primary key(id),
   constraint fk_rif foreign key(fk_usuario) references usuario(cod));
   
  /*create table debito(
  cod integer,
  numero numeric(15),
  tipo varchar(50),
  banco varchar(50),
  constraint pk_codd primary key(cod));
  
  create table credito(
  cod integer,
  numero numeric(15),
  tipo varchar(50),
  fecha_vencimiento date,
  numero_credito numeric(21),
  constraint pk_codc primary key(cod));

  create table efectivo(
  cod integer,
  numero numeric(15),
  efectivo integer,
  constraint pk_code primary key(cod));

  create table paypal(
  cod integer,
  numero numeric(15),
  efectivo integer,
  constraint pk_codp primary key(cod));*/

  create table metodo_pago(
  cod integer,
  numero_pago numeric(15),
  descripcion varchar(50),
  banco varchar(50),
  tipo varchar(50),
  fecha_vencimiento date,
  numero_credito numeric(21),
  tipo_pago varchar(40),
  constraint pk_cod primary key(cod),
  constraint pago_check_tipo
  check(tipo_pago in('Efectivo','Debito','Credito','Paypal','Digital'))
  );
  
create table pago(
  id integer,
  monto numeric(30,2),
  fec_pago date,
  fk_metodo integer,
  fk_pedido integer,
  constraint pk_pago primary key(id),
  constraint fk_ped foreign key(fk_pedido) references pedido(id),
  constraint fk_metodo_pago foreign key(fk_metodo) references metodo_pago(cod));

/*create table detalle(
  cantidad integer,
  monto_total numeric(30,2),
  fk_pago integer,
  constraint fk_pag foreign key(fk_pago) references pago(id));*/
