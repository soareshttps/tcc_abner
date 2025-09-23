drop database VolleyConnect;

create database if not exists VolleyConnect;
use VolleyConnect;

create table usuario
(
	cpf int not null,
    nome varchar(40),
    email varchar(20),
    senha varchar(20),
    primary key (cpf)
);

create table times
(
	id int not null auto_increment,
	nome varchar (20),
    primary key (id)
);

create table cronograma 
(
	id int not null auto_increment,
    mes varchar(15),
    primary key (id)
);

create table jogos
(
	id int not null auto_increment,
    local_ varchar(40),
    horario time,
    data_ date,
    equipes varchar(40),
    resultado varchar(10),
    nome_campeonato varchar(40),
    primary key (id)
);

create table administrador
(
	id int not null auto_increment,
    nome varchar(100),
    cpf varchar(20),
    credencial varchar(40),
    email varchar(40),
    senha varchar(100),
    primary key (id)
);

create table atleta
(
	id int not null auto_increment,
    nome varchar(100),
    cpf varchar(20),
    email varchar(40),
    senha varchar(100),
    time varchar(15),
    posicao varchar(40),
    genero varchar(10),
    idade varchar(100),
    disponibilidade varchar(50),
    primary key (id)
);

create table torcedor 
(
	id int not null auto_increment,
    nome varchar(100),
    cpf varchar(20),
    email varchar(40),
    senha varchar(100),
    primary key (id)
);

create table seleciona
(
	id_torcedor int not null auto_increment,
    id_atleta int not null,
    primary key (id_torcedor, id_atleta),
    foreign key (id_torcedor) references torcedor (id),
    foreign key (id_atleta) references atleta (id)
);

create table encontro
(
	id_torcedor int not null auto_increment,
    id_atleta int not null,
    primary key (id_torcedor, id_atleta),
    foreign key (id_torcedor) references torcedor (id),
    foreign key (id_atleta) references atleta (id)
);

create table assiste
(
	id_torcedor int not null,
    id_jogo int not null auto_increment,
    primary key (id_torcedor, id_jogo),
    foreign key (id_torcedor) references torcedor (id),
    foreign key (id_jogo) references jogos (id)
);

create table joga 
(
	id_atleta int not null,
    id_jogo int not null auto_increment,
    primary key (id_atleta, id_jogo),
    foreign key (id_atleta) references atleta (id),
    foreign key (id_jogo) references jogos (id)
);

create table acessa 
(
	cpf int not null,
    id_mes int not null,
    primary key (cpf, id_mes),
    foreign key (cpf) references usuario (cpf),
    foreign key (id_mes) references cronograma (id)
);

SELECT * FROM torcedor;