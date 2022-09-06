use aferihem_instr;

-- kreiranje user-a

CREATE USER 'aferihem_instr'@'localhost' IDENTIFIED BY '6#NC42]L5N?x';
GRANT SELECT, INSERT, UPDATE, DELETE ON TABLE `aferihem_instr`.* TO 'aferihem_instr'@'localhost' IDENTIFIED BY '6#NC42]L5N?x';



create table usluga
(IdUsluga int primary key auto_increment not null,
Naziv varchar(50));

create table instrukcije
(IdInstrukcija int primary key auto_increment not null,
DatumInstrukcije datetime,
Iznos decimal(7,2),
IdUsluga int,
Opis text(1000),
DatumAzur datetime,
constraint fk_usluga foreign key (IdUsluga) references usluga(IdUsluga));

alter table instrukcije add opis text(1000);

create table primanja
(IdPrimanja int primary key auto_increment not null,
Iznos decimal(7,2));


insert into usluga (Naziv) values ('PHP');
insert into usluga (Naziv) values ('Word');
insert into usluga (Naziv) values ('SQL');
insert into usluga (Naziv) values ('Excel');
insert into usluga (Naziv) values ('Ostalo');
insert into usluga (Naziv) values ('MS Access');
insert into usluga (Naziv) values ('JavaScript');
insert into usluga (Naziv) values ('HTML');
insert into usluga (Naziv) values ('Web');
insert into usluga (Naziv) values ('MySQL');


insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-6',300,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-6',1000,2);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-8',300,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-9',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-11',350,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-15',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-17',140,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-18',400,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-23',300,6);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-30',1100,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-1-30',600,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-6',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-8',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-9',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-10',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-11',300,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-13',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-15',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-16',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-18',350,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-20',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-22',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-23',200,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-26',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-28',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-2-28',300,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-12',600,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-13',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-14',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-15',140,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-16',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-20',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-20',360,9);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-21',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-22',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-26',200,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-26',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-27',740,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-27',600,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-3-29',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-4-13',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-4-16',300,10);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-4-17',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-4-19',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-4-24',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-4-24',510,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-4-25',450,10);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-2',100,10);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-3',150,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-4',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-5',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-7',160,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-9',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-10',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-12',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-14',150,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-15',310,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-15',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-16',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-17',130,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-18',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-21',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-22',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-24',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-24',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-26',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-29',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-30',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-5-31',170,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-1',310,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-2',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-4',1000,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-5',210,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-6',230,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-9',490,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-11',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-13',750,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-14',380,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-15',160,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-28',400,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-6-30',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-7-3',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-7-3',70,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-7-7',210,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-7-7',300,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-7-23',620,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-7-28',600,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-8-22',200,9);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-8-23',600,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-8-23',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-8-27',100,9);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-8-27',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-8-28',500,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-8-29',210,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-8-30',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-8-31',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-1',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-3',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-4',80,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-5',790,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-10',350,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-11',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-11',420,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-12',110,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-13',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-16',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-17',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-18',680,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-19',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-21',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-24',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-25',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2018-9-27',140,1);

select
ins.IdInstrukcija,
ins.DatumInstrukcije,
ins.Iznos,
usl.Naziv
from 
instrukcije ins join usluga usl
on ins.IdUsluga = usl.IdUsluga;


-- zarade po mjesecima

select
month(ins.DatumInstrukcije) as Mjesec,
sum(ins.Iznos) as Ukupno
from 
instrukcije ins join usluga usl
on ins.IdUsluga = usl.IdUsluga group by month(ins.DatumInstrukcije) order by month(ins.DatumInstrukcije) asc;

-- zarade po mjesecima sa primanjima


select
year(ins.DatumInstrukcije) as Godina,
month(ins.DatumInstrukcije) as Mjesec,
sum(ins.Iznos) as Ukupno,
prm.Iznos as Placa,
(sum(ins.Iznos)+prm.Iznos) as UkupnoSve
from 
instrukcije ins join primanja prm
on month(ins.DatumInstrukcije) = month(prm.DatumPrimanja) 
and
year(ins.DatumInstrukcije) = year(prm.DatumPrimanja)
group by year(ins.DatumInstrukcije), month(ins.DatumInstrukcije);


insert into usluga (Naziv) values ('VB');


insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-6',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-9',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-14',160,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-16',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-17',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-19',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-20',300,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-24',500,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-25',300,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-26',300,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-1-26',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-2-10',120,2);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-2-15',150,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-2-23',400,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-3-15',200,13);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-3-16',130,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-3-17',350,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-3-17',2100,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-3-17',200,13);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-3-17',120,13);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-3-25',390,13);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-4-4',400,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-4-7',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-4-8',180,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-4-11',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-4-13',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-4-20',350,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-4-26',400,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-4',150,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-12',50,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-19',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-22',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-23',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-24',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-25',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-26',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-29',270,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-5-30',350,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-1',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-2',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-2',2650,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-6',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-9',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-9',700,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-12',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-13',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-15',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-19',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-22',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-6-23',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-7-3',300,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-7-3',2100,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-7-4',770,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-7-6',600,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-7-24',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-7-25',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-7-26',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-7-27',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-8-21',260,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-8-22',690,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-8-18',1050,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-8-22',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-8-23',70,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-8-24',350,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-8-25',210,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-8-28',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-1',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-8',810,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-11',760,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-12',600,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-13',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-14',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-15',340,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-16',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-19',150,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-9-28',250,10);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-3',50,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-4',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-4',150,13);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-5',250,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-7',300,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-7',150,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-10',700,11);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-13',150,12);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-16',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-17',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-17',350,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-18',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-20',740,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-23',220,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-25',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-26',500,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-27',260,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-28',100,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-10-30',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-2',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-4',160,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-4',200,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-5',200,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-6',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-12',350,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-13',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-14',160,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-15',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-17',170,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-19',580,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-20',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-25',320,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-26',240,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-27',140,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-11-30',140,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-1',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-3',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-4',140,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-4',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-4',150,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-5',700,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-6',140,13);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-7',150,13);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-9',500,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-11',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-12',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-15',1000,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-15',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2017-12-20',130,1);


-- 2016

insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-7',120,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-8',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-9',160,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-11',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-12',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-14',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-15',300,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-17',500,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-19',300,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-21',300,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-22',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-23',120,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-25',150,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-26',400,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-28',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-29',130,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-30',350,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-1-31',2100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-2-2',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-2-4',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-2-5',390,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-2-8',400,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-2-11',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-2-12',180,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-2-13',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-2-16',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-2-17',350,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-3-2',400,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-3-8',150,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-3-16',50,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-3-17',200,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-3-21',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-3-24',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-3-31',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-4-13',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-4-22',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-4-26',270,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-4-28',350,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-4-29',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-4-30',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-2',2650,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-3',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-4',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-5',700,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-7',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-10',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-16',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-17',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-19',120,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-22',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-22',300,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-23',2100,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-23',770,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-24',600,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-27',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-30',140,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-5-31',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-1',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-6',260,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-7',690,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-9',1050,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-11',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-14',70,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-16',350,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-16',210,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-17',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-19',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-23',810,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-6-28',760,10);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-1',600,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-1',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-2',200,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-4',340,14);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-4',100,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-5',150,14);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-8',250,3);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-15',50,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-25',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-26',150,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-27',250,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-27',300,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-7-28',150,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-8-2',700,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-8-18',150,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-8-20',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-8-22',280,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-8-24',350,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-9-5',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-10-11',740,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-10-12',220,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-10-15',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-10-22',500,7);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-10-24',260,4);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-10-31',100,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-11-8',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-11-28',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-1',160,5);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-2',200,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-2',200,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-4',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-7',350,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-7',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-9',160,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-11',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-12',170,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-14',580,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-15',140,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-16',320,8);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-20',240,1);
insert into instrukcije (DatumInstrukcije,Iznos,IdUsluga) values ('2016-12-21',140,5);


create table korisnik
(IdKor int primary key auto_increment not null,
Ime varchar(30),
Prezime varchar(30),
KorIme varchar(30),
Sifra varchar(150),
SifraP varchar(150),
DatumRodjenja date,
Email varchar(50),
Uid varchar(150),
Aktivan int);

insert into korisnik (Ime,Prezime,KorIme,Sifra,SifraP,DatumRodjenja,Email,Uid,Aktivan) values
('Milan','Krivić','mkrivic',md5('mandalina1983'),md5('mandalina1983'),'1983-09-06','krivic.milan@gmail.com','dfzg63_gnr54TZgcv',1);

-- 2017

insert into primanja (Iznos,DatumPrimanja) values (9402.2,'2017-1-1');
insert into primanja (Iznos,DatumPrimanja) values (9819.76,'2017-2-1');
insert into primanja (Iznos,DatumPrimanja) values (10302,'2017-3-1');
insert into primanja (Iznos,DatumPrimanja) values (9939.64,'2017-4-1');
insert into primanja (Iznos,DatumPrimanja) values (10974.52,'2017-5-1');
insert into primanja (Iznos,DatumPrimanja) values (11150,'2017-6-1');
insert into primanja (Iznos,DatumPrimanja) values (10702,'2017-7-1');
insert into primanja (Iznos,DatumPrimanja) values (11102.3,'2017-8-1');
insert into primanja (Iznos,DatumPrimanja) values (10918.19,'2017-9-1');
insert into primanja (Iznos,DatumPrimanja) values (11120.76,'2017-10-1');
insert into primanja (Iznos,DatumPrimanja) values (11135.35,'2017-11-1');
insert into primanja (Iznos,DatumPrimanja) values (11085.64,'2017-12-1');


-- 2016

insert into primanja (Iznos,DatumPrimanja) values (9253.17,'2016-1-1');
insert into primanja (Iznos,DatumPrimanja) values (9260.00,'2016-2-1');
insert into primanja (Iznos,DatumPrimanja) values (9231.56,'2016-3-1');
insert into primanja (Iznos,DatumPrimanja) values (9296.05,'2016-4-1');
insert into primanja (Iznos,DatumPrimanja) values (9312.55,'2016-5-1');
insert into primanja (Iznos,DatumPrimanja) values (9348.25,'2016-6-1');
insert into primanja (Iznos,DatumPrimanja) values (9118.65,'2016-7-1');
insert into primanja (Iznos,DatumPrimanja) values (9345.18,'2016-8-1');
insert into primanja (Iznos,DatumPrimanja) values (9225.16,'2016-9-1');
insert into primanja (Iznos,DatumPrimanja) values (9348.24,'2016-10-1');
insert into primanja (Iznos,DatumPrimanja) values (9365.1,'2016-11-1');
insert into primanja (Iznos,DatumPrimanja) values (9365.00,'2016-12-1');


-- zarade po mjesecima sa primanjima


select
year(ins.DatumInstrukcije) as Godina,
month(ins.DatumInstrukcije) as Mjesec,
sum(ins.Iznos) as ZaradaInstrukcije,
prm.Iznos as Placa,
(sum(ins.Iznos)+prm.Iznos) as UkupnoSve
from 
instrukcije ins join primanja prm
on month(ins.DatumInstrukcije) = month(prm.DatumPrimanja) 
and
year(ins.DatumInstrukcije) = year(prm.DatumPrimanja)
group by year(ins.DatumInstrukcije), month(ins.DatumInstrukcije) 
order by year(ins.DatumInstrukcije) desc, month(ins.DatumInstrukcije) desc;


-- 02.11.2018

create table tipIzdatak
(IdTip int primary key auto_increment not null,
Naziv varchar(50));




create table KnjizenjeIzdatak
(IdKnjizenjeIzdatak int primary key auto_increment not null,
NazivIzdatak varchar(30),
DatumPlacanja datetime,
Iznos decimal(7,2),
IdTip int,
Opis text(1000),
DatumAzur datetime,
constraint fk_izdatak foreign key (IdTip) references tipIzdatak(IdTip));

insert into tipIzdatak (Naziv) values ('Krediti');
insert into tipIzdatak (Naziv) values ('Režije');
insert into tipIzdatak (Naziv) values ('Fiktivne rate');
insert into tipIzdatak (Naziv) values ('Namirnice');
insert into tipIzdatak (Naziv) values ('Odjeća');
insert into tipIzdatak (Naziv) values ('Kafić');
insert into tipIzdatak (Naziv) values ('Restoran');


create table trosak
(IdTrosak int primary key auto_increment not null,
Naziv varchar(50));


create table trosaknastanak
(IdTrosNast int primary key auto_increment not null,
DatumTrosak datetime,
Iznos decimal(7,2),
IdTrosak int,
Opis text(1000),
DatumAzur datetime,
constraint fk_trosak foreign key (IdTrosak) references trosak(IdTrosak));

insert into trosak (Naziv) values ('Kava');
insert into trosak (Naziv) values ('Ručak');
insert into trosak (Naziv) values ('Namirnice i potrepštine');
insert into trosak (Naziv) values ('Odjeća');
insert into trosak (Naziv) values ('Pekara');

select
tn.IdTrosNast,
tr.Naziv,
date(tn.DatumTrosak),
tn.Iznos,
tn.Opis
from trosak tr inner join trosaknastanak tn
on tr.IdTrosak = tn.IdTrosak
where date(tn.DatumTrosak) = '2019-01-09';


select 
date(tn.DatumTrosak),
sum(tn.Iznos)
from trosak tr inner join trosaknastanak tn
on tr.IdTrosak = tn.IdTrosak
group by date(tn.DatumTrosak)
order by date(tn.DatumTrosak) desc;

create table koverta
(IdUnos int primary key auto_increment not null,
Stanje decimal(7,2),
DatumPromjena date,
Iznos decimal(7,2),
TipPromjene varchar(10),
Opis varchar(256));


select * from koverta order by IdUnos desc;

select
kv.TipPromjene,
sum(kv.Iznos) as 'Iznos'
from koverta kv
where kv.TipPromjene is not null
group by kv.TipPromjene;

select max(IdUnos) from koverta

select 
tr.Naziv,
month(tn.DatumTrosak) as 'Mjesec',
year(tn.DatumTrosak) as 'Godina',
sum(tn.Iznos)
from trosak tr inner join trosaknastanak tn
on tr.IdTrosak = tn.IdTrosak
group by tr.Naziv, year(tn.DatumTrosak), month(tn.DatumTrosak)
order by tr.Naziv desc;


-- po usluzi

select
ins.IdInstrukcija,
usl.Naziv,
year(ins.DatumInstrukcije) as 'Godina',
month(ins.DatumInstrukcije) as 'Mjesec',
sum(ins.Iznos)
from 
instrukcije ins join usluga usl
on ins.IdUsluga = usl.IdUsluga
group by usl.Naziv, year(ins.DatumInstrukcije), month(ins.DatumInstrukcije)
order by year(ins.DatumInstrukcije) desc, month(ins.DatumInstrukcije) asc, usl.Naziv asc;