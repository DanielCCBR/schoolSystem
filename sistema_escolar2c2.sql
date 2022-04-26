create database sistema_escolar2c2;
use sistema_escolar2c2;

create table usuario(
codigo int(10) unsigned auto_increment not null primary key,
nome varchar(80) not null,
email varchar(100) not null,
senha varchar(150) not null
);

create table alunos(
matricula int unsigned auto_increment not null primary key,
nome varchar(80) not null,
sexo varchar(15) not null,
email varchar(100) not null,
endereco varchar(150) not null,
telefone char(15) not null,
senha varchar(150) not null
);

-- Numero / Nome / Sexo / Email / Endereço Completo/ Matéria / Telefone / Senha
create table professores(
numero int unsigned auto_increment not null primary key,
nome varchar(80) not null,
sexo varchar(15) not null,
email varchar(100) not null,
endereco varchar(150) not null,
materia varchar(150) not null,
telefone char(15) not null,
senha varchar(150) not null
);

create table funcionarios(
numero int unsigned auto_increment not null primary key,
nome varchar(80) not null,
sexo varchar(15) not null,
email varchar(100) not null,
endereco varchar(150) not null,
setor varchar(150) not null,
telefone char(15) not null,
senha varchar(150) not null
);

create table disciplinas(
numero int unsigned auto_increment not null primary key,
nome varchar(80) not null,
conteudo varchar(150) not null,
turma varchar(50) not null,
curso varchar(150) not null
);

create table cursos(
codigo int unsigned auto_increment not null primary key,
nome varchar(80) not null,
serie varchar(20) not null
);

-- Inserir 3 alunos
insert into alunos(matricula,nome,sexo,email,endereco,telefone,senha) values('10201020','aluno da silva','masculino','alunosilva@gmail.com','Rua Itajuba,230','3197897987','123456');
insert into alunos(matricula,nome,sexo,email,endereco,telefone,senha) values('10201030','aluno sem silva','masculino','alunosemsilva@gmail.com','Rua Itajuba,290','319789797987','7976');
insert into alunos(matricula,nome,sexo,email,endereco,telefone,senha) values('10201040','aluno cem silva','masculino','alunocomsilva@gmail.com','Rua Itajuba,240','319777777987','129786');
select * from alunos;

insert into professores(numero,nome,sexo,email,endereco,materia,telefone,senha) values('20201020','professor da silva','masculino','professorsilva@gmail.com','Rua Itajuba,230','Português','3197897987','123456');
insert into professores(numero,nome,sexo,email,endereco,materia,telefone,senha) values('20201030','professor sem silva','masculino','professorsemsilva@gmail.com','Rua Itajuba,290','Física','3197897987','7996');
insert into professores(numero,nome,sexo,email,endereco,materia,telefone,senha) values('20201040','professor com silva','masculino','professorcomsilva@gmail.com','Rua Itajuba,230','Matemática','3197897988','1234');
select * from professores;

insert into funcionarios(numero,nome,sexo,email,endereco,setor,telefone,senha) values('30201020','funcionario da silva','masculino','funcionariosilva@gmail.com','Rua Itajuba,230','Contas','3197897987','123456');
insert into funcionarios(numero,nome,sexo,email,endereco,setor,telefone,senha) values('30201030','funcionario sem silva','masculino','funcionariosemsilva@gmail.com','Rua Itajuba,290','Almoxerifado','3197897988','1234');
insert into funcionarios(numero,nome,sexo,email,endereco,setor,telefone,senha) values('30201040','funcionario com silva','masculino','funcionariocomsilva@gmail.com','Rua Itajuba,240','Administração','3197897997','123');
select * from funcionarios;

insert into disciplinas(numero,nome,conteudo,turma,curso) values('40201040','disciplina da silva','conteudo da silva','turma da silva','curso da silva');
insert into disciplinas(numero,nome,conteudo,turma,curso) values('40201050','disciplina sem silva','conteudo sem silva','turma sem silva','curso sem silva');
insert into disciplinas(numero,nome,conteudo,turma,curso) values('40201060','disciplina com silva','conteudo com silva','turma com silva','curso com silva');
select * from disciplinas;

insert into cursos(codigo,nome,serie) values('50201060','curso com silva','2º ano');
insert into cursos(codigo,nome,serie) values('50201560','curso sem silva','1º ano');
insert into cursos(codigo,nome,serie) values('50201040','curso da silva','3º ano');
select * from cursos;

select * from usuario;