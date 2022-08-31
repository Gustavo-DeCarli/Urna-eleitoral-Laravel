create DATABASE urna;

use urna;

create table periodos(
    id int not null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(120) not null,
    data_inicio datetime not null,
    data_fim datetime not null
);

create table eleitores(
    id int not null AUTO_INCREMENT PRIMARY KEY,
    nome varchar(120) not null ,
    titulo bigint not null,
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
    datavt datetime not null,
    candidato_id int,
    zona varchar(120) not null,
    secao varchar(120)  not null,
    foreign KEY (candidato_id) references candidatos (id)
);

create table votantes (
    id int not null AUTO_INCREMENT PRIMARY KEY,
    eleitor_id int not null,
    periodo_id int not null,
    foreign KEY (eleitor_id) references eleitores (id),
    foreign KEY (periodo_id) references periodos (id)

);