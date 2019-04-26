create table usuario(
   rif integer,
   ci numeric(9),
   pnombre varchar(30),
   snombre varchar(30),
   papellido varchar(60),
   sapellido varchar(60),
   correo varchar(200),
   constraint pk_rif primary key(rif));
   
create table pedido(
   id integer,
   nombre varchar(200),
   tipo varchar(200),
   fk_usuario integer,
   constraint pk_id primary key(id),
   constraint fk_rif foreign key(fk_usuario) references usuario(rif));
   
create table debito(
  cod integer,
  numero numeric(15),
  efectivo integer,
  paypal integer,
  tipo varchar(50),
  banco varchar(50),
  constraint pk_cod primary key(cod));
  
create table credito(
  cod integer,
  numero numeric(15),
  efectivo integer,
  paypal integer,
  tipo varchar(50),
  fecha_vencimiento varchar(50),
  numero_credito numeric(21),
  constraint pk_codc primary key(cod));
  
create table pago(
  id integer,
  monto integer,
  fec_pago date,
  fk_debito integer,
  fk_credito integer,
  fk_pedido integer,
  constraint pk_pago primary key(id),
  constraint fk_ped foreign key(fk_pedido) references pedido(id),
  constraint fk_cred foreign key(fk_credito) references credito(cod),
  constraint fk_deb foreign key(fk_debito) references debito(cod));

create table detalle(
  cantidad integer,
  monto_total integer,
  fk_pago integer,
  constraint fk_pag foreign key(fk_pago) references pago(id));
