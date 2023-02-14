create table Empresa(
	idEmpresa serial,
	telefoneContato varchar(14),
	nomeFantasia varchar(50),
	CNPJ varchar(18),
	rua char(30),
	numero int,
	bairro varchar(30),
	CEP int,
	cidade varchar(50),
	senha varchar(100),
	email varchar(100),
	
	constraint pk_empressa primary key(idEmpresa)
);

insert into Empresa values (
	default, '(17)99753-4057','TesteFantasia','12.345.678/0001-90','testeRua',1,'testeBairro',15530000,'testeCidade','testeSenha','testeGmail@gmail.com'
)
create table Candidato(
	idCandidato serial,
	CPF varchar(14),
	idade int,
	nome varchar(50),
	telefone1 varchar(14),
	telefone2 varchar(14),
	rua varchar(30),
	numero int,
	bairro varchar(30),
	CEP int,
	senha varchar(100),
	email varchar(100),
	cidade varchar(50),
	curriculos bytea,
	
	constraint pk_candidato primary key(idCandidato)
);


insert into Candidato values 
	(default,'123.456.789-12',19,'testeNome','(17)99753-4057','(17)99753-4057','testeRua',1,'testeBairro',15530000,'testeSenha','testeGmail@gmail.com','testeCidade','/home/xyz'
	)
create table Vaga(
    idVaga serial,
    dataDisponivelInicio varchar(10),
    dataDIsponivelFim varchar(10),
    propostaSalarial real, 
    observacoes varchar(200),
    idEmpresa int,
    idCargo int,

    constraint pk_vaga primary key(idVaga),
    constraint fk_vaga_empresa foreign key (idEmpresa) references Empresa(idEmpresa),
    constraint fk_vaga_cargo foreign key (idCargo) references Cargo (idCargo)

);
insert into Vaga values (default,'21/10/2022','21/11/2022',1615.55,'teste',1,1);
create table Cargo(
    idCargo serial,
    nome varchar(50),
    especificacoes varchar(200),

    constraint pk_cargo primary key (idCargo)

);

insert into Cargo values (default,'Professor','Inglês');


select c.nome, c.especificacoes, e.nomeFantasia, v.dataDisponivelInicio, v.dataDisponivelFim, v.propostaSalarial, v.observacoes
	from Cargo c inner join Vaga v
	on c.idCargo = v.idCargo inner join Empresa e
	on v.idEmpresa = e.idEmpresa
	where idVaga = 1;
	
	select c.nome, c.especificacoes, e.nomeFantasia, v.dataDisponivelInicio, v.dataDisponivelFim, v.propostaSalarial, v.observacoes
from Cargo c inner join Vaga v
on c.idCargo = v.idCargo inner join Empresa e
on v.idEmpresa = e.idEmpresa order by c.nome