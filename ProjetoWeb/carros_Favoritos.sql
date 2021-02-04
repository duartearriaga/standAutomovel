CREATE TABLE IF NOT EXISTS `TipoUtilizador` (
  `id_TipoUtilizador` int NOT NULL,
  `TipoUtilizador` varchar(20) NOT NULL,
  PRIMARY KEY (`id_TipoUtilizador`)
);

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
);


CREATE TABLE IF NOT EXISTS `carros` (
  `id_carro` int NOT NULL AUTO_INCREMENT,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `preco` int NOT NULL,
  `combustivel` varchar(20) NOT NULL,
  `ano_mes` varchar(20) NOT NULL,
  `cilindrada` varchar(20) NOT NULL,
  `potencia` varchar(20) NOT NULL,
  `n_portas` int NOT NULL,
  `lotacao` varchar(20) NOT NULL,
  `classeVeiculo` varchar(20) NOT NULL,
  `fotocarro` varchar(100) NOT NULL,
  `likes` int,
  PRIMARY KEY (`id_carro`)
);

CREATE TABLE IF NOT EXISTS `carros_favoritos` (
  `id_carroFavorito` int NOT NULL AUTO_INCREMENT,
  `id_user` int NOT NULL,
  `id_carro` int NOT NULL,
  PRIMARY KEY (`id_carroFavorito`),
  FOREIGN KEY (`id_user`) REFERENCES users(`id_user`),
  FOREIGN KEY (`id_carro`) REFERENCES carros(`id_carro`)
);



INSERT INTO `carros`(`marca`, `modelo`, `preco`, `combustivel`, `ano_mes`, `cilindrada`, `potencia`, `n_portas`, `lotacao`, `classeVeiculo`, `fotocarro`,`likes`) 
VALUES ("Ford","Mustang","100000","Gasolina","2018/10","5000","450","2","4","desportivo","FordMustang.jpg","100");