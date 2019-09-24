create table fotos(
	id_foto int not null primary key AUTO_INCREMENT,
    caminho c=varchar(50),
    login varchar(50),
    texto(250)
);
create table usuario(
	id_usuario  int not null primary key AUTO_INCREMENT,
    login varchar(50),
    senha varchar(50),
    FOREIGN KEY(id_foto) references fotos(id_foto)
);