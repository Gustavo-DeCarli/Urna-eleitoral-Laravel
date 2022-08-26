create DATABASE urna:

create table periodos(
    id int not null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(120) not null,
    data_inicio datetime not null,
    data_fim datetime not null
);

create table eleitores(
    id int not null AUTO_INCREMENT PRIMARY KEY
    nome varchar(120) not null ,
    titulo int not null,
    zona varchar(120) not null,
    secao varchar(120) not null
);

create table candidatos(
     id int not null AUTO_INCREMENT PRIMARY KEY,
     nome varchar(120) not null,
     partido varchar(120) not null,
     numero int not null,
     cargo varchar(120) not null,
     periodo varchar(120) not null
); 

create table votos(
    id int not null AUTO_INCREMENT PRIMARY KEY,
    data_inicio datetime not null,
    candidato int,
    zona varchar(120) not null,
    seção varchar(120)  not null
);

create table votantes (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    eleitor int not null,
    periodo int not null
);