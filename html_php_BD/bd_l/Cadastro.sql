create database Cadastro_Musicoterapia;
use Cadastro_Musicoterapia;
create table login (
id_tipo_usuario int primary key auto_increment,
nome varchar (80)
);
insert into login (nome) values ("Aluno");
insert into login (nome) values ("Professor");
insert into login (nome) values ("Administrador");
create table usuario (
id int primary key auto_increment,
nome varchar (80),
nome_usuario varchar (80)  not null unique,
email varchar (50) not null,
senha varchar (80) not null,
data_cadastro datetime,
data_nascimento date,
id_usuario_login int,
foto longblob,
constraint FK_tipo_usuario foreign key (id_usuario_login) references login(id_tipo_usuario)
);
create table pagina_curso (
id_curso int primary key auto_increment,
nome varchar(100)
);
insert into pagina_curso (nome) values ("Inicio Curso");
insert into pagina_curso (nome) values ("Introdução");
insert into pagina_curso (nome) values ("Leitura 1");
create table favoritos (
nome varchar(100),
data_favoritos date,
id_favoritos int primary key auto_increment,
id_favoritos_usuario int,
id_favoritos_curso int,
constraint FK_favoritos_usuario foreign key (id_favoritos_usuario) references usuario(id),
constraint FK_favoritos_curso foreign key (id_favoritos_curso) references pagina_curso(id_curso)
);
insert into usuario (nome,nome_usuario, email, senha, data_cadastro, data_nascimento, id_usuario_login, foto) values ("", "", "", 1, null, null, 3, null);
insert into usuario (nome,nome_usuario, email, senha, data_cadastro, data_nascimento, id_usuario_login, foto) values ("", "", "", 1, null, null, 3, null);
select*from usuario;
SELECT count(id_usuario_login) FROM usuario where id_usuario_login=1;
