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
	id int not null,
	nome varchar (20),
    primary key (id)
);

create table cronograma 
(
	id int not null,
    mes varchar(15),
    primary key (id)
);

create table jogos
(
	id int not null,
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
	id int not null,
    credencial varchar(40),
    primary key (id)
);

create table atleta
(
	id int not null,
    id_time int not null, 
    idade int not null,
    posicao varchar(40),
    genero varchar(10),
    disponibilidade varchar(50),
    primary key (id),
    foreign key (id_time) references times (id)
);

create table fa 
(
	id int not null,
    primary key (id)
);

create table seleciona
(
	id_fa int not null,
    id_atleta int not null,
    primary key (id_fa, id_atleta),
    foreign key (id_fa) references fa (id),
    foreign key (id_atleta) references atleta (id)
);

create table encontro
(
	id_fa int not null,
    id_atleta int not null,
    primary key (id_fa, id_atleta),
    foreign key (id_fa) references fa (id),
    foreign key (id_atleta) references atleta (id)
);

create table assiste
(
	id_fa int not null,
    id_jogo int not null,
    primary key (id_fa, id_jogo),
    foreign key (id_fa) references fa (id),
    foreign key (id_jogo) references jogos (id)
);

create table joga 
(
	id_atleta int not null,
    id_jogo int not null,
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