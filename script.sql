create table fotos(
	id_foto int not null primary key AUTO_INCREMENT,
    caminho varchar(200),
    login varchar(50),
    texto varchar(250)
);
create table usuario(
	id_usuario  int not null primary key AUTO_INCREMENT,
    login varchar(50),
    senha varchar(50),
    nome varchar(200),
    ident integer
);