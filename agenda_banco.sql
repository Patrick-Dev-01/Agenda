create database agenda charset utf8;

use agenda;

create table usuarios(
id_usuario int primary key auto_increment,
nome varchar (255),
sobrenome varchar (255),
senha varchar (255),
email varchar (255)
);

create table contatos(
id_contato int primary key auto_increment,
nome varchar (255),
contato varchar (10),
email varchar (255),
Id_usuario int,
constraint Id_usuario_FK foreign key (Id_usuario) references usuarios (id_usuario)
);