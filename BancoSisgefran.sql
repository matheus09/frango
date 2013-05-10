CREATE TABLE usuario(
	codUsuario INTEGER PRIMARY KEY,
	nome VARCHAR(20) NOT NULL,
	endereco VARCHAR(50) NOT NULL,
	datnasc VARCHAR,
	cpf CHAR(14) NOT NULL,
	telefone VARCHAR(13)NOT NULL
);
CREATE TABLE cliente(
	codCliente INTEGER PRIMARY KEY,
	FOREIGN KEY (codCliente) REFERENCES usuario (codUsuario)
);
CREATE TABLE funcionario(
	codFuncionario INTEGER PRIMARY KEY,
	salario FLOAT NOT NULL,
	login VARCHAR(20) NOT NULL,
	senha VARCHAR(20) NOT NULL,
	FOREIGN KEY (codFuncionario) REFERENCES usuario (codUsuario)	
);
CREATE TABLE administrador(
	codAdm INTEGER PRIMARY KEY,
	FOREIGN KEY (codAdm) REFERENCES funcionario (codFuncionario)
);
CREATE TABLE fornecedor(
	codFornecedor INTEGER PRIMARY KEY,
	nome VARCHAR(20) NOT NULL,
	endereço VARCHAR(50) NOT NULL,
	cnpj CHAR(18) NOT NULL,
	telefone VARCHAR(8) NOT NULL
);
CREATE TABLE produto(
	codProduto INTEGER PRIMARY KEY,
	codFornecedor INTEGER,
	nome VARCHAR(20) NOT NULL,
	preço FLOAT NOT NULL,
	qtd INTEGER,
	FOREIGN KEY (codFornecedor) REFERENCES fornecedor (codFornecedor)
);
CREATE TABLE venda(
	codVenda INTEGER PRIMARY KEY,
	codFuncionario INTEGER,
	codProduto INTEGER,
	codCliente INTEGER,
	dataVenda VARCHAR(10) NOT NULL,
	qtdVenda INTEGER NOT NULL,
	FOREIGN KEY (codFuncionario) REFERENCES funcionario (codFuncionario),
	FOREIGN KEY (codProduto) REFERENCES produto (codProduto),
	FOREIGN KEY (codCliente) REFERENCES cliente (codCliente)
);
CREATE TABLE permissao(
	codigo_permissao INTEGER PRIMARY KEY,
	nome VARCHAR(15) NOT NULL,
	descricao VARCHAR(50)   
);

CREATE TABLE permissao_usuario(
	codPermissaoUsuario INTEGER,
	codigo_permissao INTEGER,
	PRIMARY KEY (codPermissaoUsuario, codigo_permissao),
	FOREIGN KEY (codPermissaoUsuario) REFERENCES usuario (codUsuario),
	FOREIGN KEY (codigo_permissao) REFERENCES permissao (codigo_permissao)
);
CREATE TABLE estoque(
	codEstoque INTEGER PRIMARY KEY,
	codProduto INTEGER,
	FOREIGN KEY (codProduto) REFERENCES produto (codProduto)	
);
CREATE TABLE reserva(
	codReserva INTEGER PRIMARY KEY,
	codProduto INTEGER,
	codCliente INTEGER,
	dataReserva VARCHAR(10) NOT NULL,
	hora VARCHAR(5) NOT NULL,
	FOREIGN KEY (codProduto) REFERENCES produto (codProduto),
	FOREIGN KEY (codCliente) REFERENCES cliente (codCliente)
);