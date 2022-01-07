create database MyFarm;

use MyFarm;

create table tb_animais(
	id_animal int primary key not null auto_increment,
    nome_animal varchar(50) not null,
    mae_animal varchar(50) not null,
    pai_animal varchar(50),
    data_nascimento_animal date not null,
    sexo_animal varchar(10) not null,
    raca_animal varchar(10) not null
);

create table tb_vacinas(
	id_vacina int primary key not null auto_increment,
	nome_vacina varchar(50) not null,
    descricao_vacina varchar(250) not null
);

create table tb_vacinados(
	id_vacinado int primary key not null auto_increment,
    vacina int not null,
    animal int not null,
	data_vacinacao date not null
);

alter table tb_vacinados add constraint fk_cod_animal_vacinado 
	foreign key (animal) references tb_animais(id_animal);
    
alter table tb_vacinados add constraint fk_cod_vacina_usada 
	foreign key (vacina) references tb_vacinas(id_vacina);


DELIMITER $$
CREATE PROCEDURE animais_vacinados()
begin
		select tb_vacinados.id_vacinado as IDVacinado,
        tb_vacinados.vacina as CodVacina,
        tb_vacinados.animal as CodAnimal, 
        tb_vacinados.data_vacinacao as DataVacinado,
        tb_animais.nome_animal as NomeAnimal,
        tb_vacinas.nome_vacina as NomeVacina from tb_vacinados inner join tb_animais
        on tb_animais.id_animal = tb_vacinados.animal
        inner join tb_vacinas on tb_vacinas.id_vacina = tb_vacinados.vacina;
    end
$$