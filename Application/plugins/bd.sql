CREATE TABLE users(
id int not null auto_increment,
nome varchar(45) not null,
sobrenome varchar(200) not null,
nascimento date,
situacao boolean, 
grupo int not null,
primary key(id),
foreign key(grupo) references grupo (id)
);

CREATE TABLE grupos(
id int not null auto_increment,
grupo varchar(40) not null,
situacao boolean, 
primary key(id)
)