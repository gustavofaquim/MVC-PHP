
DROP DATABASE mvc_db;
CREATE DATABASE mvc_db;
USE mvc_db;

CREATE TABLE situacao(
id int not null auto_increment,
descricao varchar(80) not null,
primary key(id)
);

CREATE TABLE grupo(
id int not null auto_increment,
nome varchar(40) not null,
situacao int not null,
primary key(id),
foreign key(situacao) references situacao (id)
);

CREATE TABLE usuario(
id int not null auto_increment,
nome varchar(45) not null,
sobrenome varchar(200) not null,
user varchar(90),
senha varchar(350),
nascimento date,
situacao int not null, 
grupo int not null,
primary key(id),
foreign key(situacao) references situacao (id),
foreign key(grupo) references grupo (id)
);


CREATE TABLE post(
    id int not null auto_increment,
    titulo varchar(50) not null,
    subtitulo varchar(100) not null,
    texto longtext not null,
    usuario int not null,
    primary key(id),
    foreign key(usuario) references usuario (id) 
);

INSERT INTO situacao (id,descricao) VALUES
(1, 'ativo'),
(2, 'desativado'),
(3, 'cancelado');

INSERT INTO grupo (id, nome, situacao) VALUES
(1, 'usuario', 1),
(2, 'administrador', 1);

INSERT INTO usuario (id, nome, sobrenome, user, senha, nascimento, situacao, grupo) VALUES
(1, 'Gustavo', 'Faquim', 'gustavo.faquim', '123456789', '1999-11-15', 1, 2),
(2, 'Fulano', 'de Tal', '', 'fulano.tal', '1998-01-01', 1, 1);

