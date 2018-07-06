CREATE TABLE Entrada (
  idEntrada INTEGER NOT NULL AUTO_INCREMENT,
  dtEntrada DATE NOT NULL,
  numNF VARCHAR(10) NOT NULL,
  PRIMARY KEY(idEntrada)
);

CREATE TABLE Produto (
  idProduto INTEGER NOT NULL AUTO_INCREMENT,
  nome VARCHAR(30) NOT NULL,
  descricao VARCHAR(255) NULL,
  preco NUMERIC(18,2) NOT NULL,
  imagemLink VARCHAR(255) NULL,
  PRIMARY KEY(idProduto)
);

CREATE TABLE Cliente (
  idCliente INTEGER NOT NULL AUTO_INCREMENT,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(30) NOT NULL,
  senha VARCHAR(40) NOT NULL,
  endereco VARCHAR(100) NULL,
  cep VARCHAR(9) NULL,
  cidade VARCHAR(30) NULL,
  PRIMARY KEY(idCliente)
);

CREATE TABLE EntradaProduto (
  idEntradaProduto INTEGER NOT NULL AUTO_INCREMENT,
  idProduto INTEGER NOT NULL,
  idEntrada INTEGER NOT NULL,
  quantidade INTEGER NOT NULL,
  PRIMARY KEY(idEntradaProduto, idProduto, idEntrada),
  INDEX Entrada_has_Produto_FKIndex1(idEntrada),
  INDEX Entrada_has_Produto_FKIndex2(idProduto),
  FOREIGN KEY(idEntrada)
    REFERENCES Entrada(idEntrada)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idProduto)
    REFERENCES Produto(idProduto)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);

CREATE TABLE Compra (
  idCompra INTEGER NOT NULL AUTO_INCREMENT,
  idCliente INTEGER NOT NULL,
  idProduto INTEGER NOT NULL,
  quantidade INTEGER NOT NULL,
  estado CHAR(1) NOT NULL,
  dtCompra DATE NOT NULL,
  PRIMARY KEY(idCompra, idCliente, idProduto),
  INDEX Vendas_FKIndex1(idCliente),
  INDEX Vendas_FKIndex2(idProduto),
  FOREIGN KEY(idCliente)
    REFERENCES Cliente(idCliente)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION,
  FOREIGN KEY(idProduto)
    REFERENCES Produto(idProduto)
      ON DELETE NO ACTION
      ON UPDATE NO ACTION
);


