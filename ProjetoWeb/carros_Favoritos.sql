

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`)
);


CREATE TABLE IF NOT EXISTS `carros` (
  `id_carro` varchar(25) NOT NULL,
  `marca` varchar(20) NOT NULL,
  `modelo` varchar(20) NOT NULL,
  `preco` varchar(20) NOT NULL,
  `combustivel` varchar(20) NOT NULL,
  `ano_mes` varchar(20) NOT NULL,
  `cilindrada` varchar(20) NOT NULL,
  `potencia` varchar(20) NOT NULL,
  `n_portas` varchar(20) NOT NULL,
  `lotacao` varchar(20) NOT NULL,
  `classeVeiculo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_carro`)
);

CREATE TABLE IF NOT EXISTS `carros_favoritos` (
  `id_carroFavorito` varchar(25) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_carro` varchar(20) NOT NULL,
  PRIMARY KEY (`id_carroFavorito`),
  FOREIGN KEY (`id_user`) REFERENCES users(`id_user`),
  FOREIGN KEY (`id_carro`) REFERENCES carros(`id_carro`)
);